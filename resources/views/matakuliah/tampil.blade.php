@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Matakuliah</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('matakuliah.tambah') }}">Tambah Matakuliah</a>
    </div>
</div>

<div class="row g-3 align-items-center mt-3 mb-3">
<div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Search Bar</label>
  </div>

  <div class="col-auto">
    <form action="/matakuliah" method="GET">
    <input type="search" name="search" class="form-control">
    </form>
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
        <td class="flex-auto">
        <div style="display: flex; gap: 20px;">
            <a href="{{ route('matakuliah.edit', $data->id) }}" class="btn btn-primary mb-3" style="width: 100px;">Edit</a>
            <form action="{{ route('matakuliah.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger" style="width: 100px;">Delete</button>
            </form>
        </div>
</td>
    </tr>
    @endforeach
</table>
{{ $matakuliah->links() }}

@endsection