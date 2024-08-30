<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    function tampil() {
        $jam = Jam::get();
        return view('jam.tampil', compact('jam'));
    }

    function tambah(){
        return view('jam.tambah');
    }

    function submit(Request $request) {
        $jam = new Jam();
        $jam->sesi = $request->sesi;
        $jam->save();

        return redirect()->route('jam.tampil');
    }

    function edit($id){
        $jam = Jam::find($id);
        return view('jam.edit', compact('jam'));
    }

    function update(Request $request, $id){
        $jam = Jam::find($id);
        $jam->sesi = $request->sesi;
        $jam->update();
        return redirect()->route('jam.tampil');
    }

    function delete($id){
        $jam = Jam::find($id);
        $jam->delete();
        return redirect()->route('jam.tampil');
    }
}
