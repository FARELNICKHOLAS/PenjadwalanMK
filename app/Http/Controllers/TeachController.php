<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\matakuliah;
use App\Models\Pengampu;

class TeachController extends Controller
{
    public function index(Request $request){
        $caridosen = $request->input('caridosen');
        $carimatkul = $request->input('carimatkul');
        $pengampu = Pengampu::whereHas('dosen', function($query) use ($caridosen){

            if(!empty($caridosen)){
                $query = $query->where('dosen.nama', 'LIKE', '%' . $caridosen . '%');
            }
        })->whereHas('matakuliah', function($query) use ($carimatkul){

            if(!empty($carimatkul)){
                $query = $query->where('matakuliah.nama_matkul', 'LIKE', '%' . $carimatkul . '%');
            }
        });

        if(!empty($request->carikelas)){
            $pengampu = $pengampu->where('ruang_kelas', 'LIKE', '%' . $request->carikelas . '%');
        }

        $pengampu = $pengampu->orderBy('id', 'desc')->paginate(5);

        return view('pengampu.index', compact('pengampu'));
    }

    public function buat(Request $request){
        $dosen = Dosen::orderBy('nama', 'asc')->pluck('nama', 'id');
        $matkul = matakuliah::orderBy('nama_matkul', 'asc')->pluck('nama_matkul', 'id');

        return view('pengampu.buat', compact('dosen', 'matkul'));
    }

    public function store(Request $request){
        $request->validate([
            'ruangankelas' => 'required',
            'iddosen' => 'required',
            'kodematkul' => 'required',
        ]);

        $params = [
            'ruang_kelas' => $request->input('ruangankelas'),
            'id_dosen' => $request->input('iddosen'),
            'kode_matkul' => $request->input('kodematkul'),
        ];

        $pengampu = Pengampu::buat($params);
        return redirect()->route('pengampu.tambah'); //isi dengan rute yang seharusnya
    }

    public function edit($id){
        $pengampu = Pengampu::find($id);
        $dosen = Dosen::orderBy('nama', 'asc')->pluck('nama', 'id');
        $matkul = matakuliah::orderBy('nama', 'asc')->pluck('nama', 'id');

        if($pengampu == null){
            return view('layout.404'); //ganti dengan error 404 handling
        }

        return view('pengampu.edit', compact('pengampu', 'dosen', 'matkul'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'ruangankelas' => 'required',
            'iddosen' => 'required',
            'kodematkul' => 'required',
        ]);

        $pengampu = Pengampu::find($id);
        $pengampu->ruang_kelas = $request->input('ruangkelas');
        $pengampu->id_dosen = $request->input('iddosen');
        $pengampu->kode_matkul = $request->input('kodematkul');
        $pengampu->save();

        return redirect()->route('pengampu.update'); //ganti dengan rute yang seharusnya
    }

    public function delete($id){
        Pengampu::find($id)->delete();

        return redirect()->route('pengampu.delete')->with('success', 'Pengampu Telah berhasil di hapu!'); //ganti dengan rute yang seharusnya
    }

}
