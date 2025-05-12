<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use App\Algorithm\AlgoritmaGenetik2;

class GenetikaController extends Controller
{
    public function tampil(){
        $jam = $this->getJam();
        $hari = $this->getHari();
        $ruangan = Ruangan::get();
        $pengajar = Pengajar::with('matkul')->first();
        $jadwal = Jadwal::with('hari', 'pengajar', 'jam', 'ruangan')
        ->orderBy('id_hari', 'asc')
        ->orderBy('id_jam', 'asc')
        ->orderBy('ruang_kelas', 'asc')
        ->get();
        $semester = intval($pengajar->matkul->semester);

        return view('home', compact('jadwal', 'hari', 'ruangan', 'pengajar', 'jam', 'semester'));
    }

    public function submit(Request $request){

        $input_semester = $request->input('semester');
        $count_pengajar = Pengajar::count();
        $size_population = 10;
        $kromosom = 20;
        
        $generate = new AlgoritmaGenetik2;

        $population = $generate->initPopulation($input_semester);
        //mutasi, crossover, selection
        $generate->doCrossover($population, $count_pengajar, $size_population);
        $generate->doMutation($population, $count_pengajar, $kromosom);
        $latestPop = Jadwal::all()->all();
        $SelectedPop = $generate->doSelection($latestPop, $count_pengajar);
        
        $jadwal = Jadwal::all()->all();
        $fit = $generate->FitnessCheck($jadwal);
        
        return redirect()->back()->with([
            'pengajarHilang' => $SelectedPop['PengajarHilang'],
            'SelectedPop' => $SelectedPop['SelectedPop'],
            'fitness' => $fit['Total Fitness'],
        ]);
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
