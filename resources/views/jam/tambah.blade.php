@extends('layout')

@section('konten')
<h4>Tambah Jam</h4>
<form action="{{ route ('jam.submit') }}" method="post">
    @csrf
    <label for="jam"></label>
    <input type="text" name="sesi" class="form-control mb-2">
    <button class='btn btn-outline-dark'>Tambah</button>
</form>
@endsection