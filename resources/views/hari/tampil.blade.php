@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Hari</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{route('hari.tambah')}}">Tambah Hari</a>
    </div>
</div>



<table class="table">
    <tr>
        <th>Nama Hari</th>
        <th>Aksi</th>
    </tr>
    @foreach($hari as $no=>$data)
    <tr>
        <td>{{$data->nama}}</td>
        <td><a href="{{ route('hari.edit', $data->kode) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('hari.delete', $data->kode) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach   
</table>

@endsection