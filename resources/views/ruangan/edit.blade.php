@extends('layout')

@section('konten')
<h4>Edit Data Ruangan</h4>
<form action="{{ route ('ruangan.update', $ruangan->id) }}" method="post">
    @csrf
    <label for="ruangan">Kode Ruangan</label>
    <input type="text" name="kode_ruangan" value='{{ $ruangan->kode_ruangan }}' class="form-control mb-2">
    <label for="ruangan">Nama Ruangan</label>
    <input type="text" name="namaruangan" value='{{ $ruangan->nama_ruangan }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection