<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    function tampil() {
        $kelas = Kelas::get();
        return view('kelas.tampil', compact('kelas'));
    }

    function tambah(){
        return view('kelas.tambah');
    }

    function submit(Request $request) {
        $kelas = new Kelas();
        $kelas->nama = $request->nama;
        $kelas->jenis = $request->jenis;
        $kelas->save();

        return redirect()->route('kelas.tampil');
    }

    function edit($id){
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    function update(Request $request, $id){
        $kelas = Kelas::find($id);
        $kelas->nama = $request->nama;
        $kelas->jenis = $request->jenis;
        $kelas->update();
        return redirect()->route('kelas.tampil');
    }

    function delete($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('kelas.tampil');
    }
}
