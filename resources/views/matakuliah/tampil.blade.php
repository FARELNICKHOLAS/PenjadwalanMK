@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Matakuliah</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('matakuliah.tambah') }}">Tambah Matakuliah</a>
    </div>
</div>


<table class="table">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>SKS</th>
        <th>Tipe</th>
        <th>Semester</th>
        <th>Aksi</th>
    </tr>
    @foreach($matakuliah as $no=>$data)
    <tr>
        <td>{{ $data->kode_matkul }}</td>
        <td>{{ $data->nama_matkul }}</td>
        <td>{{ $data->sks }}</td>
        <td>{{ $data->tipe }}</td>
        <td>{{ $data->semester }}</td>
        <td><a href="{{ route('matakuliah.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('matakuliah.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection