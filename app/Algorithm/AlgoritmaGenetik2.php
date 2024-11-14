<?php

namespace app\Algorithm;

use App\Models\Hari;
use App\Models\Jam;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Pengajar;
use Illuminate\Support\Facades\DB;

class AlgoritmaGenetik2
{

    //Inisialisasi
    public function initPopulation($input_semester) {
        Jadwal::truncate();
        $population = [];
        
        // Ukuran populasi awal
        $populationSize = 10;
        
        for($i = 0; $i < $populationSize; $i++) {
            $individuUmum = [];
            $individuSelainUmum = [];
            
            $allPengajar = Pengajar::with(['matkul', 'dosen'])
                ->whereHas('matkul', function($query) use ($input_semester) {
                    $query->where('jenis_semester', $input_semester);
                })
                ->orderBy('id', 'asc')
                ->get();
                
            // Memisahkan matkul umum/lainnya
            $pengajarUmum = $allPengajar->filter(function($pengajar) {
                return $pengajar->matkul->tipe === 'Umum';
            });
            
            $pengajarSelainUmum = $allPengajar->filter(function($pengajar) {
                return $pengajar->matkul->tipe !== 'Umum';
            });
    
            foreach($pengajarSelainUmum as $pengajar) {
                $availableSlots = $this->getAvailableSlots($pengajar, $individuSelainUmum);
                
                if(empty($availableSlots)) {
                    $this->reallocateSchedules($individuSelainUmum);
                    $availableSlots = $this->getAvailableSlots($pengajar, $individuSelainUmum);
                }
                
                if(!empty($availableSlots)) {
                    $selectedSlot = $availableSlots[array_rand($availableSlots)];
                    
                    $params = [
                        'id_pengajar' => $pengajar->id,
                        'id_hari' => $selectedSlot['hari'],
                        'id_jam' => $selectedSlot['jam'],
                        'ruang_kelas' => $selectedSlot['ruangan'],
                        'tipe' => $i + 1,
                    ];
                    
                    $individuSelainUmum[] = Jadwal::create($params);
                }
            }
    
            foreach($pengajarUmum as $pengajar) {
                $availableSlots = $this->getAvailableSlotsUmum($pengajar, $individuUmum);
                
                if(!empty($availableSlots)) {
                    $selectedSlot = $availableSlots[array_rand($availableSlots)];
                    
                    $params = [
                        'id_pengajar' => $pengajar->id,
                        'id_hari' => 5,
                        'id_jam' => $selectedSlot['jam'],
                        'ruang_kelas' => $selectedSlot['ruangan'],
                        'tipe' => $i + 1,
                    ];
                    
                    $individuUmum[] = Jadwal::create($params);
                }
            }
    
            $individu = array_merge($individuSelainUmum, $individuUmum);
            $population = $individu;
        }
    
        return $population;
    }
    
    private function getAvailableSlots($pengajar, $existingSchedules) {
        $availableSlots = [];
        
        for($hari = 1; $hari <= 4; $hari++) {
            $jams = Jam::all();
            
            foreach($jams as $jam) {
                $ruangans = Ruangan::all();
                
                foreach($ruangans as $ruangan) {
                    $conflict = false;
                    
                    foreach($existingSchedules as $schedule) {
                        if($schedule->id_hari == $hari && 
                           $schedule->id_jam == $jam->id && 
                           $schedule->ruang_kelas == $ruangan->id) {
                            $conflict = true;
                            break;
                        }
                        
                        // Cek konflik dosen
                        if($schedule->id_hari == $hari && 
                           $schedule->id_jam == $jam->id && 
                           $schedule->Pengajar->id_dosen == $pengajar->id_dosen) {
                            $conflict = true;
                            break;
                        }
                        
                        // Cek konflik kelas
                        if($schedule->id_hari == $hari && 
                           $schedule->id_jam == $jam->id && 
                           $schedule->Pengajar->kelas == $pengajar->kelas) {
                            $conflict = true;
                            break;
                        }
                    }
                    
                    if(!$conflict) {
                        $availableSlots[] = [
                            'hari' => $hari,
                            'jam' => $jam->id,
                            'ruangan' => $ruangan->id
                        ];
                    }
                }
            }
        }
        
        return $availableSlots;
    }
    
    private function getAvailableSlotsUmum($pengajar, $existingSchedules) {
        $availableSlots = [];
        
        $jams = Jam::all();
        
        foreach($jams as $jam) {
            $ruangans = Ruangan::all();
            
            foreach($ruangans as $ruangan) {
                $conflict = false;
                
                foreach($existingSchedules as $schedule) {
                    if($schedule->id_jam == $jam->id && 
                       $schedule->ruang_kelas == $ruangan->id) {
                        $conflict = true;
                        break;
                    }
                    
                    if($schedule->id_jam == $jam->id && 
                       $schedule->Pengajar->kelas == $pengajar->kelas) {
                        $conflict = true;
                        break;
                    }
                }
                
                if(!$conflict) {
                    $availableSlots[] = [
                        'jam' => $jam->id,
                        'ruangan' => $ruangan->id
                    ];
                }
            }
        }
        
        return $availableSlots;
    }
    
    private function reallocateSchedules(&$schedules) {
        // hapus jadwal terakhir untuk membuat ruang
        if(!empty($schedules)) {
            array_pop($schedules);
        }
    }

    //fitness
    public function FitnessCheck($population) {
        $fitnessValues = [];
        $conflictsData = [];
        $currentConflicts = [];
        $populationFitness = 0;
        $fitnessValueSum = 0;
        foreach ($population as $individu) {
            $conflicts = 0;
            $jadwal = Jadwal::whereIn('id', $individu)->get();
            
            foreach ($jadwal as $i => $jadwal1) {
                for ($j = $i + 1; $j < count($jadwal); $j++) {
                    $jadwal2 = $jadwal[$j];

                    //Jika hari dan sesi sama
                    if($jadwal1->id_hari==$jadwal2->id_hari && 
                        $jadwal1->id_jam==$jadwal2->id_jam){
                            //Cek apakah ruangan sama 
                            if($jadwal1->ruang_kelas==$jadwal2->ruang_kelas){
                                $conflicts++;
                                $currentConflicts[] = [$jadwal1->id, $jadwal2->id];
                            }elseif($jadwal1->Pengajar->id_dosen == $jadwal2->Pengajar->id_dosen){
                                //Cek apakah dosen sama
                                $conflicts++;
                                $currentConflicts[] = [$jadwal1->id, $jadwal2->id];
                            }
                            elseif($jadwal1->Pengajar->kode_matkul ==$jadwal2->Pengajar->kode_matkul){
                                //Cek apakah kelas mahasiswa yang mengambil matkul sama
                                $conflicts++;
                                $currentConflicts[] = [$jadwal1->id, $jadwal2->id];
                            }
                            elseif($jadwal1->id_pengajar ==$jadwal2->id_pengajar){
                                //Cek apakah ada matkul yang sama diambil 2 kali dalam seminggu
                                $conflicts++;
                                $currentConflicts[] = [$jadwal1->id, $jadwal2->id];
                            }
                    }
                }
            }
            

            //Hitung fitness
            $fitnessValue = 1 / (1 + $conflicts);
            $fitnessValueSum += $fitnessValue;
            $fitnessValues[] = $fitnessValue;
            $conflictsData[] = $currentConflicts;
            $populationFitness = $fitnessValueSum / count($population);
            
            $individu->value = $fitnessValue;
            $individu->save();
            
        }

        return ['fitness Values' => $fitnessValues, 
                'conflicts Data' => $conflictsData,
                'Total Fitness' => $populationFitness
            ];
    }
    
    //Crossover
    public function randomZeroToOne(){
        return (float) rand() / (float) getrandmax();
    }

    public function offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, $offspring){
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
        return rand(0, $count_pengajar-1);
    }

    public function createOffspringModel($offspring) {
        $offspringModel = new Jadwal();
        $offspringModel->id_pengajar = $offspring['id_pengajar'];
        $offspringModel->id_hari = $offspring['id_hari'];
        $offspringModel->id_jam = $offspring['id_jam'];
        $offspringModel->ruang_kelas = $offspring['ruang_kelas'];
        $offspringModel->tipe = $offspring['tipe'];
        $offspringModel->save();
    
        return $offspringModel;
    }

    public function randomHari() {
        return rand(1, 4);
    }
    
    public function randomJam() {
        return rand(1, 3);
    }
    
    public function randomPengajar() {
        $pengajar = Pengajar::all()->pluck('id')->toArray();
        return $pengajar[array_rand($pengajar)];
    }
    
    public function randomRuangKelas() {
        $ruang_kelas = Ruangan::all()->pluck('id')->toArray();
        return $ruang_kelas[array_rand($ruang_kelas)];
    }

    public function mutateOffspring($offspring) {
        $offspring['id_hari'] = $this->randomHari();
        $offspring['id_jam'] = $this->randomJam();
    
        if ($this->randomZeroToOne() < 0.5) {
            $offspring['ruang_kelas'] = $this->randomRuangKelas();
        }
    
        return $offspring;
    }

    public function doCrossover($population, $count_pengajar, $size_population){
        $crossover_rate = 0.8;
        $offsprings = [];

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
            // Child
            $offspring1 = $this->offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, 1);
            $offspring2 = $this->offspring($count_pengajar, $parent1, $parent2, $cutPointIndex, 2);

            $offsprings[] = $this->createOffspringModel($offspring1);
            $offsprings[] = $this->createOffspringModel($offspring2);
        }
        
        return $offsprings;
    }

    //Mutation
    public function getRandomIndexOfGen($count_pengajar){
        return rand(0, ($count_pengajar - 1));
    }

    public function getRandomIndexOfIndividu($input_kromosom){
        return rand(0, $input_kromosom - 1);
    }

    public function doMutation($population, $count_pengajar, $input_kromosom) {
        $mr = 1 / $count_pengajar;
        $JmlMutation = round($mr * $input_kromosom);
    
        for ($i = 0; $i < $JmlMutation; $i++) {
            // Pilih individu acak
            $individuIndex = $this->getRandomIndexOfIndividu(count($population));
            $individu = $population[$individuIndex];
    
            // Cari nilai baru untuk mutasi
            $hari = Hari::inRandomOrder()->first()->kode; 
            $jam = Jam::inRandomOrder()->first()->id;
            $ruangan = Ruangan::inRandomOrder()->first()->id; 
    
            // Periksa konflik sebelum ubah
            $conflictExists = Jadwal::where('id_hari', $hari)
                                    ->where('id_jam', $jam)
                                    ->where('ruang_kelas', $ruangan)
                                    ->exists();
            
            // Jika tidak ada konflik, lakukan mutasi
            if (!$conflictExists) {
                $individu->id_hari = $hari;
                $individu->id_jam = $jam;
                $individu->ruang_kelas = $ruangan;
                $individu->save();
            }
        }
        return $population;
    }
    
    //selection
    public function fitnessSorting($temporaryPop, $population_size) {
        $fitTemporaryPop = [];
        
        foreach ($temporaryPop as $key => $individu) {
            $fitnessData = $this->FitnessCheck($temporaryPop);
            $fitnessValue = $fitnessData['fitness Values'][0];
            
            $fitTemporaryPop[] = [
                'fitnessValue' => $fitnessValue,
                'individuIndex' => $key
            ];
        }
    
        usort($fitTemporaryPop, function ($a, $b) {
            return $b['fitnessValue'] <=> $a['fitnessValue'];
        });
    
        $fitTemporaryPop = array_slice($fitTemporaryPop, 0, $population_size);
    
        $sortedPopulation = [];
        foreach ($fitTemporaryPop as $item) {
            $sortedPopulation[] = $temporaryPop[$item['individuIndex']];
        }
    
        return $sortedPopulation;
    }
    

    public function doSelection($latestPop, $count_pengajar) {
        $fitnessData = $this->FitnessCheck($latestPop);
        $fitnessValues = $fitnessData['fitness Values'];
        $totalFitness = $fitnessData['Total Fitness'];
    
        $population = Jadwal::with('Pengajar')->get();
        
        $allPengajar = Pengajar::pluck('id')->toArray();
        $scheduledPengajar = [];
    
        $rouletteWheel = [];
        foreach ($fitnessValues as $index => $fitness) {
            $probability = $fitness / $totalFitness;
            $rouletteWheel[$index] = $probability + ($rouletteWheel[$index - 1] ?? 0);
        }
    
        $selectedPopulation = [];
        $maxIter = $count_pengajar + 40;
        $iter = 0;
    
        while ($iter < $maxIter && count($scheduledPengajar) < count($allPengajar)) {
            $randomValue = mt_rand() / mt_getrandmax();
            $iter++;
    
            foreach ($rouletteWheel as $index => $threshold) {
                $jadwal = $population->firstWhere('id', $latestPop[$index]['id']);
                
                if (in_array($jadwal->id_pengajar, $scheduledPengajar)) {
                    continue;
                }
    
                $data = [
                    'id individu' => $jadwal->id,
                    'id dosen' => $jadwal->Pengajar->id_dosen,
                    'id hari' => $jadwal->id_hari,
                    'id jam' => $jadwal->id_jam,
                    'id ruangan' => $jadwal->ruang_kelas,
                    'id kelas' => $jadwal->Pengajar->kelas,
                    'id matkul' => $jadwal->Pengajar->kode_matkul,
                    'id_pengajar' => $jadwal->id_pengajar
                ];
    
                $isConflict = false;
                foreach ($selectedPopulation as $selected) {
                    if (($selected['id dosen'] == $data['id dosen'] && 
                         $selected['id hari'] == $data['id hari'] && 
                         $selected['id jam'] == $data['id jam']) ||
                        ($selected['id ruangan'] == $data['id ruangan'] && 
                         $selected['id hari'] == $data['id hari'] && 
                         $selected['id jam'] == $data['id jam']) ||
                        ($selected['id kelas'] == $data['id kelas'] && 
                         $selected['id hari'] == $data['id hari'] && 
                         $selected['id jam'] == $data['id jam']) ||
                        ($selected['id kelas'] == $data['id kelas'] && 
                         $selected['id matkul'] == $data['id matkul']) ||
                        ($selected['id dosen'] == $data['id dosen'] && 
                         $selected['id matkul'] == $data['id matkul'])) {
                        $isConflict = true;
                        break;
                    }
                }
    
                if ($randomValue <= $threshold && !$isConflict) {
                    $selectedPopulation[] = $data;
                    $scheduledPengajar[] = $data['id_pengajar'];
                    break;
                }
            }

        }
    
        foreach ($allPengajar as $pengajarId) {
            if (!in_array($pengajarId, $scheduledPengajar)) {
                $possibleSchedule = $population->first(function ($jadwal) use ($pengajarId, $selectedPopulation) {
                    if ($jadwal->id_pengajar != $pengajarId) {
                        return false;
                    }
    
                    $data = [
                        'id individu' => $jadwal->id,
                        'id dosen' => $jadwal->Pengajar->id_dosen,
                        'id hari' => $jadwal->id_hari,
                        'id jam' => $jadwal->id_jam,
                        'id ruangan' => $jadwal->ruang_kelas,
                        'id kelas' => $jadwal->Pengajar->kelas,
                        'id matkul' => $jadwal->Pengajar->kode_matkul,
                        'id_pengajar' => $jadwal->id_pengajar
                    ];
    
                    foreach ($selectedPopulation as $selected) {
                        if (($selected['id dosen'] == $data['id dosen'] && 
                             $selected['id hari'] == $data['id hari'] && 
                             $selected['id jam'] == $data['id jam']) ||
                            ($selected['id ruangan'] == $data['id ruangan'] && 
                             $selected['id hari'] == $data['id hari'] && 
                             $selected['id jam'] == $data['id jam']) ||
                            ($selected['id kelas'] == $data['id kelas'] && 
                             $selected['id hari'] == $data['id hari'] && 
                             $selected['id jam'] == $data['id jam']) ||
                            ($selected['id kelas'] == $data['id kelas'] && 
                             $selected['id matkul'] == $data['id matkul']) ||
                            ($selected['id dosen'] == $data['id dosen'] && 
                             $selected['id matkul'] == $data['id matkul'])) {
                            return false;
                        }
                    }
                    return true;
                });
    
                if ($possibleSchedule) {
                    $data = [
                        'id individu' => $possibleSchedule->id,
                        'id dosen' => $possibleSchedule->Pengajar->id_dosen,
                        'id hari' => $possibleSchedule->id_hari,
                        'id jam' => $possibleSchedule->id_jam,
                        'id ruangan' => $possibleSchedule->ruang_kelas,
                        'id kelas' => $possibleSchedule->Pengajar->kelas,
                        'id matkul' => $possibleSchedule->Pengajar->kode_matkul,
                        'id_pengajar' => $possibleSchedule->id_pengajar
                    ];
                    $selectedPopulation[] = $data;
                    $scheduledPengajar[] = $pengajarId;
                }
            }
        }
    
        $selectedIds = array_column($selectedPopulation, 'id individu');
        DB::table('jadwal')
            ->whereNotIn('id', $selectedIds)
            ->delete();

        $pengajarHilang = $this->checkPengajar();
    
        return [
            'SelectedPop' => $selectedPopulation,
            'PengajarHilang' => $pengajarHilang, 
        ];
    }

    //For Debugging
    public function checkPengajar(){
        $pengajar = Pengajar::get();
        $jadwal = Jadwal::pluck('id_pengajar')->toArray();
  
        $pengajarHilang = [];
    
        foreach($pengajar as $data){
            if (!in_array($data->id, $jadwal)) {
                $pengajarHilang[] = $data->id;
            }
        }
    
        return $pengajarHilang;
    }

}