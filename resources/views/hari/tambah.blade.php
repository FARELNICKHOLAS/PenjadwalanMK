@extends('layout')

@section('konten')
<h4>Tambah hari</h4>
<form action="{{ route ('hari.submit') }}" method="post">
    @csrf
    <label for="hari"></label>
    <input type="text" name="nama" class="form-control mb-2">
    <button class='btn btn-outline-dark'>Tambah</button>
</form>
@endsection