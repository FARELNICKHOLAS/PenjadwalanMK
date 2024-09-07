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
use App\Algorithm\GenerateGA;

class GenetikaController extends Controller
{
    public function tampil(){
        $jam = $this->getJam();
        $hari = $this->getHari();

        $ruangan = Ruangan::get();
        $pengajar = Pengajar::get();

        $generate = new GenerateGA;
        $data_yangKonflik = $generate->cekJadwalKonflik();
        
        
        $jadwal = Jadwal::with('hari', 'pengajar', 'jam', 'ruangan')
                            ->orderBy('id_hari', 'asc')
                            ->orderBy('id_jam', 'asc')
                            // ->orderBy('id', 'asc')
                            ->get();
        
        // dd($jadwal);

        return view('home', compact('jadwal', 'hari', 'ruangan', 'pengajar', 'jam', 'data_yangKonflik'));
    }

    public function submit(Request $request){

        $input_semester = 'Ganjil';
        $input_kromosom = 10; //sesuaikan
        $input_generasi = 200; //sesuaikan
        $input_crossover = 0.5; //sesuaikan
        $input_mutasi = 0.1;  //sesuaikan
        $count_pengajar = Pengajar::count();

        // dd($input_generasi);

        $kromosom = $input_kromosom * $input_generasi;
        $crossover = $input_kromosom * $input_crossover; 
        
        $generate = new GenerateGA;
        $data_kromosom = $generate->randKromosom($kromosom, $count_pengajar, $input_semester);

        $data_kromosom = $generate->doCrossover($data_kromosom, $crossover);
        $totalMutasi = (3 * $count_pengajar) * $input_kromosom * $input_mutasi;
        $data_kromosom = $generate->doMutation($data_kromosom, $totalMutasi, $count_pengajar);

        dd($data_kromosom);

        $total_gen = Setting::firstOrNew(['key' => 'total_gen']);
        $total_gen->nama = 'Total Gen';
        $total_gen->value = $crossover;
        $total_gen->save();
        
        $mutasi = Setting::firstOrNew(['key' => 'mutasi']);
        $mutasi->nama = 'Mutasi';
        $mutasi->value = $totalMutasi;
        $mutasi->save();

        $result_schedules = $generate->checkPinalty($data_kromosom);
        return redirect()->route('kurikulum.tampil'); //ganti rute

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

            return view('kurikulum.tampil', compact('crossover', 'mutasi', 'value_schedule', 'jadwal', 'data_kromosom', 'id'));
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
