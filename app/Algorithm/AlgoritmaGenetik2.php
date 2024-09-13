<?php

namespace app\Algorithm;

use App\Models\Hari;
use App\Models\Jam;
use App\Models\Jadwal;
use App\Models\matakuliah;
use App\Models\Ruangan;
use App\Models\Pengajar;
use Illuminate\Support\Facades\DB;

class AlgoritmaGenetik2
{

    //Inisialisasi

    public function initPopulation($kromosom, $count_pengajar, $input_semester){

        //$count_pengajar == panjang gen untuk membangun individu
        //$kromosom == untuk membangun populasi

        Jadwal::truncate();
        $population = [];
        
        for($i = 0; $i < 10; $i++){

            $individuUmum = [];
            $individuSelainUmum = [];

            $count_matkulUmum = Pengajar::with('matkul')
                ->whereHas('matkul', function($query) use ($input_semester){
                    $query->where('jenis_semester', $input_semester)
                            ->where('tipe', 'Umum');
                    })
                ->orderBy('id', 'asc')
                ->count();

            //Untuk mengambil list pengajar dengan tipe matkul SELAIN Umum
            $listPengajarWajib = Pengajar::with('matkul')
                ->whereHas('matkul', function($query) use ($input_semester){
                    $query->where('jenis_semester', $input_semester)
                            ->where('tipe', '!=', 'Umum');
                    })
                ->orderBy('id', 'asc')
                ->get();

            //Untuk mengambil list pengajar dengan tipe matkul Umum
            $listPengajarUmum = Pengajar::with('matkul')
                    ->whereHas('matkul', function($query) use ($input_semester){
                        $query->where('jenis_semester', $input_semester)
                                ->where('tipe', 'Umum');
                        })
                    ->orderBy('id', 'asc')
                    ->get();
            
            $count_matkulSelainUmum = $count_pengajar - $count_matkulUmum;

            //inisialisasi kromosom SELAIN umum
            for($j = 0; $j < $count_matkulSelainUmum; $j++){
                // dd($listPengajarWajib);

                $pengajar = $listPengajarWajib[$j];

                $hari = Hari::where('kode', '!=', 5)
                            ->inRandomOrder()
                            ->first();
                $jam = Jam::inRandomOrder()
                            ->first();
                $ruangan = Ruangan::inRandomOrder()
                            ->first();

                if($jam && $ruangan && $pengajar && $hari){
                    $params = [
                        'id_pengajar' => $pengajar->id,
                        'id_hari' => $hari->kode,
                        'id_jam' => $jam->id,
                        'ruang_kelas' => $ruangan->id,
                        'tipe' => $i+1,
                    ];
                }else{
                    abort(404);
                }

                
                $individuSelainUmum[] = Jadwal::create($params);
                
            }

            //inisialisasi kromosom Umum
            for($k = 0; $k < $count_matkulUmum; $k++){

                $pengajar = $listPengajarUmum[$k];

                $hari = Hari::where('kode', 5)
                            ->inRandomOrder()
                            ->first();
                $jam = Jam::inRandomOrder()
                            ->first();
                $ruangan = Ruangan::inRandomOrder()
                            ->first();

                if($jam && $ruangan && $pengajar && $hari){
                    $params = [
                        'id_pengajar' => $pengajar->id,
                        'id_hari' => $hari->kode,
                        'id_jam' => $jam->id,
                        'ruang_kelas' => $ruangan->id,
                        'tipe' => $i+1,
                    ];
                }else{
                    abort(404);
                }

                $individuUmum[] = Jadwal::create($params);
            }

            //menggabungkan individu umum dan individu selain umum
            $individu = array_merge($individuSelainUmum, $individuUmum);
            //mengisi nilai $population dengan nilai $individu
            $population = $individu;
        }
        // dd($individu);


        return $population;
    }

    //fitness

    public function FitnessCheck($population) {
        $fitnessValues = [];
        $conflictsData = [];
        $count_pengajar = Pengajar::count();
        $populationFitness = 0; // Untuk Stopping Criteria
        $fitnessValueSum = 0;
    
        foreach ($population as $individu) {
            $conflicts = 0;
            $currentConflicts = []; 
            
            $jadwal = Jadwal::whereIn('id', $individu)->get();
            
            foreach ($jadwal as $i => $jadwal1) {
                for ($j = $i + 1; $j < count($jadwal); $j++) {
                    $jadwal2 = $jadwal[$j];
                    
                    if (($jadwal1->id_hari == $jadwal2->id_hari &&
                    $jadwal1->id_jam == $jadwal2->id_jam &&
                    $jadwal1->ruang_kelas == $jadwal2->ruang_kelas) ||
                    ($jadwal1->id_hari == $jadwal2->id_hari &&
                    $jadwal1->id_jam == $jadwal2->id_jam &&
                    $jadwal1->pengajar->id_dosen == $jadwal2->pengajar->id_dosen) ||
                    ($jadwal1->id_hari == $jadwal2->id_hari &&
                    $jadwal1->id_jam == $jadwal2->id_jam &&
                    $jadwal1->id_pengajar == $jadwal2->id_pengajar)) {
                        $conflicts++;
                        $currentConflicts[] = [$jadwal1->id, $jadwal2->id];
                    }
                }
            }
            // dd("Individu: ", $individu, "Jadwal: ", $jadwal, "tipedata jadwal: ", gettype($jadwal), "fitnessValue: ", $fitnessValue);
            
            $fitnessValue = 1 / (1 + $conflicts);
            $fitnessValueSum += $fitnessValue;
            $fitnessValues[] = $fitnessValue;
            $conflictsData[] = $currentConflicts;
            $populationFitness = $fitnessValueSum / $count_pengajar;


            // Update nilai fitness ke setiap jadwal dalam individu
            foreach ($jadwal as $j) {
                $j->value = $fitnessValue; // Menyimpan fitness ke kolom 'value'
                $j->save(); // Simpan perubahan ke database
            }
        }
        // dd("FitnessValues", $fitnessValues, "ConflictData", $conflictsData);
        return ['fitness Values' => $fitnessValues, 'Jadwal Bentrok' => $conflictsData, 'Total Fitness' => $populationFitness];
    }
    
    //Crossover
    

    public function randomZeroToOne(){
        return (float) rand() / (float) getrandmax();
    }

    public function offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, $offspring){
        // $count_pengajar = Pengajar::count();
        $result = [];

        if ($offspring === 1) {
            $i = 0;
            foreach ($parent1 as $key => $value) {
                if ($i <= $cutPointIndex) {
                    $result[$key] = $parent1[$key];
                } else {
                    $result[$key] = $parent2[$key];
                }
                $i++;
            }
        }
    
        if ($offspring === 2) {
            $i = 0;
            foreach ($parent1 as $key => $value) {
                if ($i <= $cutPointIndex) {
                    $result[$key] = $parent2[$key];
                } else {
                    $result[$key] = $parent1[$key];
                }
                $i++;
            }
        }
        
        return $result;
    }

    public function cutPointRandom($count_pengajar){
        // $count_pengajar = Pengajar::count();
        return rand(0, $count_pengajar-1);
    }

    public function doCrossover($population, $count_pengajar, $size_population){
        // crossover rate = 0.8
        $crossover_rate = 0.8;

        for($i = 0; $i < $size_population; $i++){
           $randZeroToOne = $this->randomZeroToOne();
           if($randZeroToOne < $crossover_rate){
            $parents[$i] = $randZeroToOne;
           }
        }

        foreach(array_keys($parents) as $key){
            foreach(array_keys($parents) as $subkey){
                if($key !== $subkey){
                    $result[] = [$key, $subkey];
                }
            }
            array_shift($parents);
        }

        $cutPointIndex = $this->cutPointRandom($count_pengajar);
     

        foreach($result as $listOfCrossOver){
            $parent1 = $population[$listOfCrossOver[0]]->toArray();
            $parent2 = $population[$listOfCrossOver[1]]->toArray();
            //Child
            $offspring1 = $this->offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, 1);
            $offspring2 = $this->offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, 2);
            
            $offsprings[] = $offspring1;
            $offsprings[] = $offspring2;
            
        }
        
        dd($offsprings);
        
        return $offsprings;
    }

    //Mutation

    public function getRandomIndexOfGen($count_pengajar){
        return rand(0, ($count_pengajar - 1));
    }

    public function getRandomIndexOfIndividu($input_kromosom){
        return rand(0, $input_kromosom - 1);
    }

    public function doMutation($population, $count_pengajar, $input_kromosom){
        //mutation rate (mr) = 1/jmlKromosom
        //JmlMutation = mr * jmlpopulation
        $jumlahGen = $count_pengajar;
        $mr = 1 / $jumlahGen;
        $JmlMutation = round($mr * $input_kromosom);

        if($JmlMutation > 0){
            for($i = 0; $i < $JmlMutation; $i++){
                $indexOfIndividu = $this->getRandomIndexOfIndividu($input_kromosom);
                $selectedIndividu = $population[$indexOfIndividu];
                // $cloning = clone $selectedIndividu;
                $mutatedGen = $selectedIndividu;
                
                //proses utama mutasi
                $mutatedGen->id_hari = Hari::inRandomOrder()->first()->kode;
                $mutatedGen->id_jam = Jam::inRandomOrder()->first()->id;
                $mutatedGen->ruang_kelas = Ruangan::inRandomOrder()->first()->id;
                $mutatedGen->save();
                
                $selectedIndividu = $mutatedGen;
                $population[$indexOfIndividu] = $selectedIndividu;
                
                // dd("mutasi selectedIndividu: ", $selectedIndividu, "population: ", $population, "Cloning: ", $cloning);
                dd($mutatedGen);
            }
        }else{
            abort(404, 'Jumlah Mutasi 0');
        }

        return $population;
    }
    
    public function doSelection($population, $offsprings) {
        // Gabungkan populasi dengan offsprings
        // $combinedPopulation = array_merge($population, $offsprings);
        $combinedPopulation = array_merge($population, $offsprings);
        // $combinedPopulation[] = $offsprings;
        // dd("genalgorithm", gettype($combinedPopulation), $combinedPopulation);
    
        // Periksa nilai fitness untuk seluruh populasi gabungan
        // dd("tipe data: ", gettype($combinedPopulation), "value combinePopulation: ", $combinedPopulation);
        $fitnessData = $this->FitnessCheck($combinedPopulation);
        
        // Pastikan penamaan key konsisten (tidak ada spasi)
        $fitnessValues = $fitnessData['fitness Values']; // ubah ke format yang benar
        
        // Urutkan populasi berdasarkan nilai fitness (desc)
        if (count($fitnessValues) === count($combinedPopulation)) {
            array_multisort($fitnessValues, SORT_DESC, $combinedPopulation);
        } else {
            // Jika panjang tidak sama, cukup kembalikan populasi gabungan tanpa di-sort
            return $combinedPopulation;
        }
        
        $newPopulation = array_slice($combinedPopulation, 0, intval(count($combinedPopulation) / 2));
        
        $newFitnessData = $this->FitnessCheck($newPopulation);
        $newConflictsData = $newFitnessData['Jadwal Bentrok'];
        
        $maxIterations = 15000;
        $iteration = 0;
        
        while (array_sum(array_map('count', $newConflictsData)) > 0 && $iteration < $maxIterations) {
            // Cari individu dengan jumlah konflik maksimal
            $conflictCounts = array_map('count', $newConflictsData);
            $maxConflictsIndex = array_search(max($conflictCounts), $conflictCounts);
        
            // Hapus individu dengan konflik terbanyak dari populasi baru
            if (isset($newPopulation[$maxConflictsIndex])) {
                unset($newPopulation[$maxConflictsIndex]);
            }
        
            // Reindex array setelah penghapusan
            $newPopulation = array_values($newPopulation);
            $newFitnessData = $this->FitnessCheck($newPopulation);
            $newConflictsData = $newFitnessData['Jadwal Bentrok'];
        
            $iteration++;
        }
        
        // Kembalikan populasi baru yang sudah bebas konflik
        return $newPopulation;
    }
    

}