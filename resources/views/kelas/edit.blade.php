@extends('layout')

@section('konten')
<h4>Edit Matakuliah</h4>
<form action="{{ route ('kelas.update', $kelas->id) }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="kode" value='{{ $kelas->nama }}' class="form-control mb-2">
    <label>Tipe</label>
    <input type="text" name="nama" value='{{ $kelas->nama }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection