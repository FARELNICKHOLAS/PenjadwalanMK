@extends('layout')

@section('konten')
<h4>Tambah Ruangan</h4>
<form action="{{ route ('ruangan.submit') }}" method="post">
    @csrf
    <label for="ruangan">Kode Ruangan</label>
    <input type="text" name="kode_ruangan" class="form-control mb-2">
    <label for="ruangan">Nama Ruangan</label>
    <input type="text" name="namaruangan" class="form-control mb-2">
    <button class='btn btn-outline-dark'>Tambah</button>
</form>
@endsection