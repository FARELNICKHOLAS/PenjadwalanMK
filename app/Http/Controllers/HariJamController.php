<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use App\Models\Hari;
use App\Models\hariJam;
use Illuminate\Http\Request;

class HariJamController extends Controller
{
    public function tampil(Request $request){
        $harijam = hariJam::orderBy('id', 'desc')->get();
        return view('harijam.tampil', compact('harijam'));
    }

    public function create(Request $request){
        $hari = Hari::orderBy('nama', 'asc')->pluck('nama', 'kode');
        $jam = Jam::orderBy('id', 'asc')->pluck('sesi', 'id');

        return view('harijam.create', compact('hari', 'jam'));
    }

    public function store(Request $request){
        $request->validate([
            'kode_harijam' => 'required',
            'id_hari' => 'required',
            'id_jam' => 'required',
        ]);

        $params =[
            'kode_harijam' => $request->input('kode_harijam'),
            'id_hari' => $request->input('hari'),
            'id_jam' => $request->input('hari'),
        ];

        $harijam = hariJam::create($params);

        return redirect()->route('harijam.tampil');
    }

    public function edit($id){
        $harijam = hariJam::find($id);
        $hari = Hari::orderBy('nama', 'asc')->pluck('nama', 'kode');
        $jam = Jam::orderBy('id', 'asc')->pluck('sesi', 'id');

        if($harijam == null){
            return view('harijam.404');
        }

        return view('harijam.edit', compact('harijam', 'hari', 'jam'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode_harijam' => 'required',
            'id_hari' => 'required',
            'id_jam' => 'required',
        ]);

        $harijam = hariJam::find($id);
        $harijam->kode_harijam = $request->input('kode_harijam');
        $harijam->id_hari = $request->input('id_hari');
        $harijam->id_jam = $request->input('id_jam');
        $harijam->save();

        return redirect()->route('harijam.tampil');
    }

    public function delete($id){
        hariJam::find($id)->delete();

        return redirect()->route('harijam.tampil');
    }
}
