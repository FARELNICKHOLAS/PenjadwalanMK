<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MKController extends Controller
{
    function tampil() {
        $matakuliah = Matakuliah::get();
        return view('matakuliah.tampil', compact('matakuliah'));
    }

    function tambah(){
        return view('matakuliah.tambah');
    }

    function submit(Request $request) {
        $matakuliah = new Matakuliah();
        $matakuliah->kode_matkul = $request->kode;
        $matakuliah->nama_matkul = $request->nama;
        $matakuliah->sks = $request->sks;
        $matakuliah->tipe = $request->tipe;
        $matakuliah->semester = $request->semester;
        $matakuliah->save();

        return redirect()->route('matakuliah.tampil');
    }

    function edit($id){
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    function update(Request $request, $id){
        $matakuliah = Matakuliah::find($id);
        $matakuliah->kode_matkul = $request->kode;
        $matakuliah->nama_matkul = $request->nama;
        $matakuliah->sks = $request->sks;
        $matakuliah->tipe = $request->tipe;
        $matakuliah->semester = $request->semester;
        $matakuliah->update();
        return redirect()->route('matakuliah.tampil');
    }

    function delete($id){
        $matakuliah = Matakuliah::find($id);
        $matakuliah->delete();
        return redirect()->route('matakuliah.tampil');
    }
}