@extends('layout')

@section('konten')
<h4>Edit Data Dosen</h4>
<form action="{{ route ('dosen.update', $dosen->id) }}" method="post">
    @csrf
    <label for="dosen">NIP</label>
    <input type="text" name="nipdosen" value='{{ $dosen->nip }}' class="form-control mb-2">
    <label for="dosen">Nama Dosen</label>
    <input type="text" name="namadosen" value='{{ $dosen->nama }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection