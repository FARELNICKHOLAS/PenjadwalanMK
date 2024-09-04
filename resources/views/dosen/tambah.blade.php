@extends('layout')

@section('konten')
<h4>Tambah Dosen</h4>
<form action="{{ route ('dosen.submit') }}" method="post">
    @csrf
    <label for="dosen">NIP</label>
    <input type="text" name="nipdosen" class="form-control mb-2">
    <label for="dosen">Nama Dosen</label>
    <input type="text" name="namadosen" class="form-control mb-2">
    <button class='btn btn-outline-dark'>Tambah</button>
</form>
@endsection