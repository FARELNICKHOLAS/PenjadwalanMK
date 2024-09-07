<?php

namespace app\Algorithm;

use App\Models\Hari;
use App\Models\Jam;
use App\Models\Jadwal;
use App\Models\matakuliah;
use App\Models\Ruangan;
use App\Models\Pengajar;
use Illuminate\Support\Facades\DB;

class AlgoritmaGenetik
{
    public function initPopulation($kromosom, $count_pengajar, $input_semester){

        //$count_pengajar == panjang gen untuk membangun individu
        //$kromosom == untuk membangun populasi

        Jadwal::truncate();
        $population = [];
        
        for($i = 0; $i < $kromosom; $i++){

            $individuUmum = [];
            $individuSelainUmum = [];

            $count_matkulUmum = Pengajar::with('matkul')
                ->whereHas('matkul', function($query) use ($input_semester){
                    $query->where('jenis_semester', $input_semester)
                            ->where('tipe', 'Umum');
                    })
                ->orderBy('id', 'asc')
                ->count();
            
            $count_matkulSelainUmum = $count_pengajar - $count_matkulUmum;

            //inisialisasi kromosom SELAIN umum
            for($j = 0; $j < $count_matkulSelainUmum; $j++){

                $listPengajarWajib = Pengajar::with('matkul')
                    ->whereHas('matkul', function($query) use ($input_semester){
                        $query->where('jenis_semester', $input_semester)
                                ->where('tipe', '!=', 'Umum');
                        })
                    ->orderBy('id', 'asc')
                    ->get();
                $pengajar = $listPengajarWajib[$j];

                $hari = Hari::where('id', '!=', 5)
                            ->inRandomOrder()
                            ->first();
                $jam = Jam::inRandomOrder()
                            ->first();
                $ruangan = Ruangan::inRandomOrder()
                            ->first();

                if($jam && $ruangan && $pengajar && $hari){
                    $params = [
                        'id_pengajar' => $pengajar[$j],
                        'id_hari' => $hari->kode,
                        'id_jam' => $jam->id,
                        'ruang_kelas' => $ruangan->id,
                        'tipe' => $i+1,
                    ];
                }else{
                    abort(404);
                }

                $individuSelainUmum = Jadwal::create($params);
            }

            //inisialisasi kromosom Umum
            for($k = 0; $k < $count_matkulUmum; $k++){

                $listPengajarUmum = Pengajar::with('matkul')
                    ->whereHas('matkul', function($query) use ($input_semester){
                        $query->where('jenis_semester', $input_semester)
                                ->where('tipe', 'Umum');
                        })
                    ->orderBy('id', 'asc')
                    ->get();
                $pengajar = $listPengajarUmum[$k];

                $hari = Hari::where('id', 5)
                            ->inRandomOrder()
                            ->first();
                $kam = Jam::inRandomOrder()
                            ->first();
                $ruangan = Ruangan::inRandomOrder()
                            ->first();

                if($jam && $ruangan && $pengajar && $hari){
                    $params = [
                        'id_pengajar' => $pengajar[$k],
                        'id_hari' => $hari->kode,
                        'id_jam' => $jam->id,
                        'ruang_kelas' => $ruangan->id,
                        'tipe' => $i+1,
                    ];
                }else{
                    abort(404);
                }

                $individuUmum = Jadwal::create($params);
            }

            //menggabungkan individu umum dan individu selain umum
            $individu = Join($individuSelainUmum, $individuUmum);

            $population = $individu;
        }

        return $population;
    }

    public function fitnessCheck($population){

    }

    // public function doCrossover($){
    //     // crossover rate = 0.8
        

    // }

    // public function doMutation($){

    // }
    
    // public function doSelection($){

    // }

 
}