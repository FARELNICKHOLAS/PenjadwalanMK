@extends('layout')

@section('konten')
<h4>Edit hari</h4>
<form action="{{ route ('hari.update', $hari->kode) }}" method="post">
    @csrf
    <label for="hari"></label>
    <input type="text" name="nama" value='{{ $hari->nama }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection