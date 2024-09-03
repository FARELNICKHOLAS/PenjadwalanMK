<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\kelas;
use App\Models\Pengajar;
use App\Models\matakuliah;
use Illuminate\Http\Request;
use App\Imports\PengajarImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PengajarController extends Controller
{
    public function tampil(Request $request){
        if($request->has('search')){
            $pengajar = Pengajar::where('kode_matkul', 'LIKE', '%' .$request->search. '%')->orWhere('id_dosen', 'LIKE', '%' . $request->search . '%')->orWhere('id_namakelas', 'LIKE', '%' . $request->search . '%')->paginate(20);
        }else{
            $dosen = $this->getDosen();
            $matkul = $this->getMatkul();
            $namakelas = $this->getNamaKelas();
            $pengajar = Pengajar::with('matkul', 'namakelas', 'dosen')->orderBy('id', 'asc')->get();
        }
        
        return view('kurikulum', compact('pengajar', 'dosen', 'matkul', 'namakelas'));
    }
    
    public function getDosen(){
        $dosen = Dosen::OrderBy('id', 'asc')->get();
        return $dosen;
    }

    public function getMatkul(){
        $matkul = matakuliah::OrderBy('id', 'asc')->get();
        return $matkul;
    }

    public function getNamaKelas(){
        $namaKelas = kelas::OrderBy('id', 'asc')->get();
        return $namaKelas;
    }
    
    function tambah(){
        return view('Pengajar.tambah');
    }

    function submit(Request $request) {
        $pengajar = new Pengajar();
        $pengajar->id_dosen = $request->id_dosen;
        $pengajar->kode_matkul = $request->kode_matkul;
        $pengajar->id_namakelas = $request->id_namakelas;
        $pengajar->save();

        return redirect()->route('hari.tampil');
    }

    function edit($id){
        $pengajar = Pengajar::find($id);
        return view('pengajar.edit', compact('pengajar'));
    }

    function update(Request $request, $id){
        $pengajar = Pengajar::find($id);
        $pengajar->nama = $request->nama;
        $pengajar->update();
        return redirect()->route('pengajar.tampil');
    }

    function delete(){
        DB::statement('ALTER TABLE pengampu DROP FOREIGN KEY pengampu_id_pengajar_foreign;');
        Pengajar::truncate();
        DB::statement('ALTER TABLE pengampu ADD CONSTRAINT pengampu_id_pengajar_foreign FOREIGN KEY (id_pengajar) REFERENCES pengajar(id);');
        return redirect()->back();
    }

    public function importexcel(Request $request){
        $data = $request->file('pengampufile');

        $namafile = $data->getClientOriginalName();
        $data->move('DataPengajar', $namafile);

        Excel::import(new PengajarImport, \public_path('/DataPengajar/' . $namafile));

        return redirect()->back();
    }

}
