<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;


class LectureController extends Controller
{
    public function index(Request $request){
        $dosen = Dosen::orderBy('id', 'asc',);
        if(!empty($request->searchname)){
            $dosen = $dosen->where('nama', 'LIKE', '%' . $request->searchname . '%');
        }

        if(!empty($request->searchnip)){
            $dosen = $dosen->where('nip', 'LIKE', '%' . $request->searchnip . '%');
        }

        $dosen = $dosen->paginate(5);

        return view('dosen.tampil', compact('dosen')); //perbaiki dengan mengisi path yang benar
    }

    public function create(Request $request){
        return view('dosen.tambah');
    }

    public function store(Request $request){
        $request->validate([
            'nipdosen' => 'nullable',
            'namadosen' => 'required',
        ]);

        $params = [
            'nip' => $request->input('nipdosen'),
            'nama' => $request->input('namadosen'),
        ];

        $dosen = Dosen::create($params);

        return redirect()->route('dosen.tampil'); //ganti dengan yang seharusnya
    }

    public function edit($id){
        $dosen = Dosen::find($id);

        if($dosen == null){
            return view('admin.layout.404'); //atau ke halaman 404 error handling
        }

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nipdosen' => 'nullable',
            'namadosen' => 'required',
        ]);

        $dosen = Dosen::find($id);
        $dosen->nip =  $request->input('nipdosen');
        $dosen->nama =  $request->input('namadosen');
        $dosen->save();

        return redirect()->route('dosen.tampil'); //ganti dengan yang seharusnya
    }

    public function delete($id){
        Dosen::find($id)->delete();

        return redirect()->route('dosen.tampil')->with('success', 'Data Dosen Telah berhasil dihapus!');
    }
}
