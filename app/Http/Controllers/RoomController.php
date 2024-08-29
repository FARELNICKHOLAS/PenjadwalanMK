<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    function index(Request $request){
        $ruangan = Ruangan::orderBy('id', 'desc');

        if (!empty($request->searchcode))
        {
            $ruangan = $ruangan->where('kode_ruangan', 'LIKE', '%' . $request->searchcode . '%');
        }

        if (!empty($request->searchname))
        {
            $ruangan = $ruangan->where('nama_ruangan', 'LIKE', '%' . $request->searchname . '%');
        }

        $ruangan = $ruangan->paginate(4);

        return view('ruangan.index', compact('ruangan')); //ganti dengan yang seharusnya
    }

    public function buat(Request $request){
        return view('halam.untuk.tambah.ruangan'); //ganti dengan yang benar
    }

    public function store(Request $request){
        $request->validate([
            'kode_ruangan' => 'unique:ruangan,kode_ruangan|required',
            'namaruangan' => 'required',
        ]);

        $params = [
            'kode_ruangan' => $request->input('kode_ruangan'),
            'nama_ruangan' => $request->input('namaruangan'),
        ];

        $ruangan = Ruangan::create($params);

        return redirect()->route('ruangan.buat'); //ganti dengan yang seharusnya
    }

    public function edit($id){
        $ruangan = Ruangan::find($id);

        if($ruangan == null){
            return view('ruangan.404'); //ganti ke yang seharusnya error 404 handling
        }

        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode_ruangan' => 'unique:ruangan,kode_ruangan' . $id . '|required',
            'namaruangan' => 'required',
        ]);

        $ruangan = Ruangan::find($id);
        $ruangan->kode_ruangan = $request->input('kode_ruangan');
        $ruangan->nama_ruangan = $request->input('namaruangan');
        $ruangan->save();

        return redirect()->route('ruangan.update'); //ganti dengan yang seharusnya
    }

    public function delete($id){
        Ruangan::find($id)->delete();

        return redirect()->route('ruangan.delete')->with('success', 'Ruangan Berhasil dihapus!'); //ganti dengan rute yang seharusnya
    }
}
