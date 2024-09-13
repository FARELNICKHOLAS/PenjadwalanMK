<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Setting;
use App\Models\Pengajar;
use App\Models\matakuliah;
use Illuminate\Http\Request;
// use App\Algorithm\GenerateGA;
use App\Algorithm\AlgoritmaGenetik2;

class GenetikaController extends Controller
{
    public function tampil(){
        $jam = $this->getJam();
        $hari = $this->getHari();

        $ruangan = Ruangan::get();
        $pengajar = Pengajar::get();

        // $generate = new GenerateGA;
        // $data_yangKonflik = $generate->cekJadwalKonflik();
        
        
        $jadwal = Jadwal::with('hari', 'pengajar', 'jam', 'ruangan')
                            ->orderBy('id_hari', 'asc')
                            ->orderBy('id_jam', 'asc')
                            // ->orderBy('id', 'asc')
                            ->get();
        
        // dd($jadwal);

        return view('coba', compact('jadwal', 'hari', 'ruangan', 'pengajar', 'jam'));
    }

    public function submit(Request $request){

        $input_semester = 'Ganjil';
        // $input_kromosom = 10; //sesuaikan
        // $input_generasi = 20; //sesuaikan
        $input_crossover = 0.5; //sesuaikan
        $input_mutasi = 0.1;  //sesuaikan
        $count_pengajar = Pengajar::count();
        $size_population = 35; //bisa disesuaikan

        // dd($input_generasi);

        // $kromosom = $input_kromosom * $input_generasi;
        $kromosom = 20;
        $crossover = 20 * $input_crossover; //ganti 20 menjadi $input_kromosom
        
        $generate = new AlgoritmaGenetik2;

        $population = $generate->initPopulation($kromosom, $count_pengajar, $input_semester);
        
        
        // $fitness = $generate->FitnessCheck($population);
        //lakukan iterasi
        $offsprings = $generate->doCrossover($population, $count_pengajar, $size_population);
        $new_population = $generate->doMutation($population, $count_pengajar, $kromosom); //ganti kromosom menjadi input kromosom
        $fitness = $generate->FitnessCheck($new_population);

        $jadwal_arr = $generate->doSelection($new_population, $offsprings);

        $jadwal_obj = collect($jadwal_arr);

        // usort($jadwal_arr, function($a, $b) {
        //     return $a->id_hari <=> $b->id_hari;
        // });
        
        // usort($jadwal_arr, function($a, $b) {
        //     return $a->id_jam <=> $b->id_jam;
        // });

        // $ids = array_map(function($jadwal) {
        //     return $jadwal['id']; // Ekstrak ID dari setiap objek dalam array
        // }, $jadwal_arr);

        // Ambil data dari database berdasarkan ID
        $jadwal = Jadwal::whereIn('id', $jadwal_obj->id)
            ->orderBy('id_hari', 'asc')
            ->orderBy('id_jam', 'asc')
            ->get();
        
        // dd("genControl jadwalFromDatabase", gettype($jadwalFromDatabase), $jadwalFromDatabase);
        // $result_schedules = $generate->checkPinalty($data_kromosom);
        return view('coba', compact('jadwal', 'fitness'));
        // return redirect()->route('coba.tampil');

    }

    public function result($id){
        $kromosom = Jadwal::select('tipe')->groupBy('tipe')->get()->count();
        $crossover = Setting::where('key', Setting::CROSSOVER)->first();
        $mutasi = Setting::where('key', Setting::MUTASI)->first();
        $value_schedule = Jadwal::where('tipe', $id)->first();

        $jadwal = Jadwal::orderBy('id_hari', 'asc')
            ->orderBy('id_jam', 'asc')
            ->where('tipe', $id)
            ->get();
        
            // if(empty($value_schedule)){
            //     abort(404);
            // }

            for($i = 1; $i <= $kromosom; $i++){
                $value_schedules = Jadwal::where('tipe', $i)->first();
                $data_kromosom[] = [
                    'value_schedules' => $value_schedules->value,
                ];
            }

            return view('coba.tampil', compact('crossover', 'mutasi', 'value_schedule', 'jadwal', 'data_kromosom', 'id'));
    }

    public function cekSemester($jenis_semester){

        $nilai = $jenis_semester;
        $matakuliah = matakuliah::get();
        if($nilai == 'Genap'){
            foreach($matakuliah as $no=>$data){
                if($data->semester % 2 == 0){
                    $pilih_semester[] = $data->id;
                }
            }
        }elseif($nilai == 'Ganjil') {
            foreach($matakuliah as $no=>$data){
                if($data->semester % 2 != 0){
                    $pilih_semester[] = $data->id;
                }
            }
        }
        
        return $pilih_semester;
    }

    public function getPengajar(){
        $pengajar = Pengajar::get();
        return $pengajar;
    }
    public function getRuangan(){
        $ruangan = Ruangan::get();
        return $ruangan;
    }
    public function getHari(){
        $hari = Hari::get();
        return $hari;
    }
    public function getJam(){
        $jam = Jam::get();
        return $jam;
    }
}
