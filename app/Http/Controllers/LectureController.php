<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;


class LectureController extends Controller
{
    public function index(Request $request){
        $dosen = Dosen::orderBy('id', 'desc');
        if(!empty($request->searchname)){
            $dosen = $dosen->where('nama', 'LIKE', '%' . $request->searchname . '%');
        }

        if(!empty($request->searchnip)){
            $dosen = $dosen->where('nip', 'LIKE', '%' . $request->searchnip . '%');
        }

        $dosen = $dosen->paginate(10);

        return view('path.dimana.akan.ditampilkan', compact('dosen')); //perbaiki dengan mengisi path yang benar
    }

    public function buat(Request $request){
        return view('path.ke.halaman.tambah.dosen');
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

        $dosen = Dosen::buat($params);

        return redirect()->route('dosen.tambah'); //ganti dengan yang seharusnya
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

        return redirect()->route('dosen.update'); //ganti dengan yang seharusnya
    }

    public function destroy($id){
        Dosen::find($id)->delete();

        return redirect()->route('dosen.hapus')->with('success', 'Data Dosen Telah berhasil dihapus!');
    }
}
