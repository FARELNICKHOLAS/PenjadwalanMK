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
        <td class="flex-auto">
        <div style="display: flex; gap: 20px;">
            <a href="{{ route('kelas.edit', $data->id) }}" class="btn btn-primary mb-3" style="width: 100px;">Edit</a>
            <form action="{{ route('kelas.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger" style="width: 100px;">Delete</button>
            </form>
        </div>
</td>
    </tr>
    @endforeach
</table>

@endsection