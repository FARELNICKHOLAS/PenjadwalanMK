@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Kelas</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('kelas.tambah') }}">Tambah Kelas</a>
    </div>
</div>


<table class="table">
    <tr>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Aksi</th>
    </tr>
    @foreach($kelas as $no=>$data)
    <tr>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->jenis }}</td>
        <td><a href="{{ route('kelas.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('kelas.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection