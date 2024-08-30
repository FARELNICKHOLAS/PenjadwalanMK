@extends('layout')

@section('konten')

<h4>Tambah Matakuliah</h4>

<form action="{{ route('matakuliah.submit') }}" method="post">
    @csrf
    <label>Kode</label>
    <input type="text" name="kode" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>SKS</label>
    <input type="number" name="sks" class="form-control mb-2">
    <label>Tipe</label>
    <input type="text" name="tipe" class="form-control mb-2">
    <label>semester</label>
    <input type="number" name="semester" class="form-control mb-2">

    <button class="btn btn-outline-dark">Tambah</button>
</form>

@endsection