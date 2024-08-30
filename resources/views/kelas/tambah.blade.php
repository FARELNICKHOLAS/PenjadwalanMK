@extends('layout')

@section('konten')

<h4>Tambah Kelas</h4>

<form action="{{ route('kelas.submit') }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control mb-2">
    <button class="btn btn-outline-dark">Tambah</button>
</form>

@endsection