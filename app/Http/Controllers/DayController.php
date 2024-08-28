<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use Illuminate\Http\Request;

class DayController extends Controller
{
    function tampil() {
        $hari = Hari::get();
        return view('hari.tampil', compact('hari'));
    }

    function tambah(){
        return view('hari.tambah');
    }

    function submit(Request $request) {
        $hari = new Hari();
        $hari->nama = $request->nama;
        $hari->save();

        return redirect()->route('hari.tampil');
    }

    function edit($kode){
        $hari = Hari::find($kode);
        return view('hari.edit', compact('hari'));
    }

    function update(Request $request, $kode){
        $hari = Hari::find($kode);
        $hari->nama = $request->nama;
        $hari->update();
        return redirect()->route('hari.tampil');
    }

    function delete($kode){
        $hari = Hari::find($kode);
        $hari->delete();
        return redirect()->route('hari.tampil');
    }
}
