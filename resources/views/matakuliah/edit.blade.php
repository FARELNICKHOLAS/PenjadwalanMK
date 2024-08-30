@extends('layout')

@section('konten')
<h4>Edit Matakuliah</h4>
<form action="{{ route ('matakuliah.update', $matakuliah->id) }}" method="post">
    @csrf
    <label>Kode</label>
    <input type="text" name="kode" value='{{ $matakuliah->kode_matkul }}' class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" value='{{ $matakuliah->nama_matkul }}' class="form-control mb-2">
    <label>SKS</label>
    <input type="number" name="sks" value='{{ $matakuliah->sks }}' class="form-control mb-2">
    <label>Tipe</label>
    <input type="text" name="tipe" value='{{ $matakuliah->tipe }}' class="form-control mb-2">
    <label>Semester</label>
    <input type="number" name="semester" value='{{ $matakuliah->semester }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection