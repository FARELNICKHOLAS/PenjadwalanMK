<?php

namespace app\Algorithm;

use App\Models\Hari;
use App\Models\Jam;
use App\Models\Jadwal;
use App\Models\matakuliah;
use App\Models\Ruangan;
use App\Models\Pengajar;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isType;

class GenerateGA
{
    public function randKromosom($kromosom, $count_pengajar, $input_semester){

        Jadwal::truncate();

        for($i = 0; $i < $kromosom; $i++){
            $value = [];
            for($j = 0; $j < $count_pengajar; $j++){

                $pengajarList = Pengajar::with('matkul')
                    ->whereHas('matkul', function($query) use ($input_semester){
                    $query->where('jenis_semester', $input_semester)
                          ->where('tipe', 'Wajib');
                })
                ->get();

                $pengajar = $pengajarList[$j];

                // dd($pengajar);
                
                // $pengajarList = Pengajar::with('matkul')
                //                     ->whereHas('matkul', function($query) use ($input_semester){
                //                         $query->where('jenis_semester', $input_semester)
                //                             ->where('tipe', 'Wajib');
                //                     })
                //                     ->orderBy('id') // Urutkan berdasarkan ID pengajar
                //                     ->get();

                // $pengajar = $pengajarList[$j];
            
                
    
                $hari = Hari::where('kode', '!=', 5)->inRandomOrder()->first();
                $ruangan = Ruangan::inRandomOrder()->first();
                $jam = Jam::inRandomOrder()->first();
                // dd($pengajar);

                while ($this->isScheduleConflict($hari, $jam, $ruangan)) {
                    $hari = Hari::where('kode', '!=', 5)->inRandomOrder()->first();
                    $jam = Jam::inRandomOrder()->first();
                }
                
                if ($pengajar && $hari && $ruangan && $jam) {
                    $params = [
                        'id_pengajar' => $pengajar->id,
                        'id_hari' => $hari->kode,
                        'id_jam' => $jam->id,
                        'ruang_kelas' => $ruangan->id,
                        'tipe' => $i + 1, // Tipe kromosom
                    ];

                $value = Jadwal::create($params);
            }

                $data[] = $value;

            }
            

            return $data;

        }
    }

    private function isScheduleConflict($hari, $jam, $ruangan) {
        // Function to check for conflicting schedules
        return Jadwal::where('id_hari', $hari->kode)
                      ->where('id_jam', $jam->id)
                      ->where('ruang_kelas', $ruangan->id)
                      ->exists();
    }

    public function cekJadwalKonflik() {
        // Ambil semua jadwal
        $jadwalList = Jadwal::with(['pengajar', 'hari', 'jam', 'ruangan'])->get();
        
        $data_yangKonflik = [];
    
        foreach ($jadwalList as $jadwal1) {
            foreach ($jadwalList as $jadwal2) {
                // Jangan bandingkan dengan dirinya sendiri
                if ($jadwal1->id == $jadwal2->id) {
                    continue;
                }
    
                // Cek konflik berdasarkan ruangan, hari, dan jam
                if ($jadwal1->id_hari == $jadwal2->id_hari && 
                    $jadwal1->id_jam == $jadwal2->id_jam &&
                    $jadwal1->ruang_kelas == $jadwal2->ruang_kelas) {
                    
                    // Ruangan yang sama pada hari dan jam yang sama
                    $data_yangKonflik[] = [
                        'type' => 'Ruangan',
                        'jadwal1' => $jadwal1,
                        'jadwal2' => $jadwal2
                    ];
                }
    
                // Cek konflik berdasarkan dosen, hari, dan jam
                if ($jadwal1->id_hari == $jadwal2->id_hari && 
                    $jadwal1->id_jam == $jadwal2->id_jam &&
                    $jadwal1->id_pengajar == $jadwal2->id_pengajar) {
                    
                    // Dosen yang sama pada hari dan jam yang sama
                    $data_yangKonflik[] = [
                        'type' => 'Dosen',
                        'jadwal1' => $jadwal1,
                        'jadwal2' => $jadwal2
                    ];
                }
            }
        }
    
        return $data_yangKonflik;
    }    


    public function doCrossover($kromosom, $totalCrossover){
        $new_kromosoms = [];
        $popSize = count($kromosom);

        for ($i = 0; $i < $totalCrossover; $i++) {
            $parent1 = $kromosom[rand(0, $popSize - 1)]->toArray();
            $parent2 = $kromosom[rand(0, $popSize - 1)]->toArray();

            $crossoverPoint = rand(1, count($parent1) - 2);

            $child1 = array_merge(array_slice($parent1, 0, $crossoverPoint), array_slice($parent2, $crossoverPoint));
            $child2 = array_merge(array_slice($parent2, 0, $crossoverPoint), array_slice($parent1, $crossoverPoint));

            $new_kromosoms[] = $child1;
            $new_kromosoms[] = $child2;
        }

        return $new_kromosoms;
    }

    public function doMutation($kromosoms, $totalMutasi, $maxGeneValue){
        $popSize = count($kromosoms);
        
        for ($i = 0; $i < $totalMutasi; $i++) {
            $chromosomeIndex = rand(0, $popSize - 1);
            $geneIndex = rand(0, count($kromosoms[$chromosomeIndex]) - 1);
            
            $kromosoms[$chromosomeIndex][$geneIndex] = rand(1, $maxGeneValue);
        }

        return $kromosoms;
    }

    public function checkPinalty($kromosom)
    {
        $penalty = 0;
    
        // Cek bentrok pengajar, hari, dan jam
        $conflicts = Jadwal::select('id_pengajar', 'id_hari', 'id_jam', DB::raw('count(*) as count'))
            ->groupBy('id_pengajar', 'id_hari', 'id_jam')
            ->having('count', '>', 1)
            ->get();
    
        $penalty += count($conflicts);
    
        // Cek bentrok ruangan, hari, dan jam
        $conflicts = Jadwal::select('ruang_kelas', 'id_hari', 'id_jam', DB::raw('count(*) as count'))
            ->groupBy('ruang_kelas', 'id_hari', 'id_jam')
            ->having('count', '>', 1)
            ->get();
    
        $penalty += count($conflicts);
    
        // Tambahkan kondisi untuk jenis bentrok lainnya
    
        return $penalty;
    }

public function increaseProcess($kromosom, $columns)
{
    $penaltySchedules = Jadwal::select(DB::raw(implode(', ', $columns) . ', COUNT(*) as jumlah'))
        ->groupBy($columns)
        ->having('jumlah', '>', 1)
        ->get();

    return $penaltySchedules;
}
    

    public function menambahValue($jadwal){
        if(!empty($jadwal)){
            foreach($jadwal as $key => $data){
                if($data->jumlah > 1){
                    $jadwal_diupdate = Jadwal::where('tipe', $data->tipe)->get();

                    DB::beginTransaction();
                    foreach($jadwal_diupdate as $key=> $val){
                        $val->value = $val->value + ($data->jumlah - 1);
                        $val->value_proses = $val->value_proses . " + " . ($data->jumlah - 1);
                        $val->save();
                    }

                    DB::commit();
                }
            }
        }

        return $jadwal;
    }

}