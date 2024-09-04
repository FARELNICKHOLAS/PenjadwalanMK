<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Ruangan;
use App\Models\Pengajar;
use App\Models\Pengampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeachController extends Controller
{
    public function index(Request $request){
        $caripengajar = $request->input('caripengajar');
        $cariruangkls = $request->input('cariruangkls');

        $pengampu = Pengampu::query();

        if ($request->filled('caripengajar')) {
            $pengampu->whereHas('pengajar', function($query) use ($caripengajar) {
                $query->where('pengajar.id', 'LIKE', '%' . $caripengajar . '%');
            });
        }
    
        if ($request->filled('cariruangkls')) {
            $pengampu->whereHas('ruangan', function($query) use ($cariruangkls) {
                $query->where('ruangan.kode_ruangan', 'LIKE', '%' . $cariruangkls . '%');
            });
        }

        $ruangan = $this->getRuangan();
        $pengajar = $this->getAjaran();
        $pengampu = Pengampu::with('pengajar', 'ruangan')->orderBy('id', 'desc')->get();
        
        return view('pengampu.tampil', compact('pengampu', 'ruangan', 'pengajar'));
    }

    public function getRuangan(){
        $ruangan = Ruangan::orderBy('id', 'asc')->get();
        return $ruangan;
    }

    public function getAjaran(){
        $pengajar = Pengajar::orderBy('id', 'asc')->get();
        return $pengajar;
    }

    public function create(Request $request){
        $ruangan = $this->getRuangan();
        $pengajar = $this->getAjaran();
        $pengampu = Pengampu::with('pengajar', 'ruangan');
        
        return view('pengampu.tambah', compact('pengampu', 'ruangan', 'pengajar'));
    }

    public function store(Request $request){
        $request->validate([
            'idPengajar' => 'required',
            'ruangkelas' => 'required',
        ]);

        $params = [
            'id_pengajar' => $request->input('idPengajar'),
            'ruang_kelas' => $request->input('ruangkelas'),
        ];

        $pengampu = Pengampu::create($params);
        return redirect()->route('pengampu.tampil'); //isi dengan rute yang seharusnya
    }

    public function edit($id){
        $ruangan = $this->getRuangan();
        $pengajar = $this->getAjaran();
        $pengampu = Pengampu::with('ruangan', 'pengajar')->find($id);

        return view('pengampu.edit', compact('pengampu', 'ruangan', 'pengajar'));
    }

    public function update(Request $request, $id){
        $pengampu = Pengampu::find($id);
        $pengampu->id_pengajar = $request->input('idPengajar');
        $pengampu->ruang_kelas = $request->input('ruangkelas');
        $pengampu->save();

        return redirect()->route('pengampu.tampil'); //ganti dengan rute yang seharusnya
    }

    public function delete($id){
        Pengampu::find($id)->delete();

        return redirect()->route('pengampu.tampil')->with('success', 'Pengampu Telah berhasil di hapu!'); //ganti dengan rute yang seharusnya
    }

}
