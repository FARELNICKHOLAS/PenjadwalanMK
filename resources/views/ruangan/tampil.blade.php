@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Ruangan</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{route('ruangan.tambah')}}">Tambah Ruangan</a>
    </div>
</div>



<table class="table">
    <tr>
        <th>Kode Ruangan</th>
        <th>Nama Ruangan</th>
        <th>Aksi</th>
    </tr>
    @foreach($ruangan as $no=>$data)
    <tr>
        <td>{{$data->kode_ruangan}}</td>
        <td>{{$data->nama_ruangan}}</td>
        <td><a href="{{ route('ruangan.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('ruangan.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
</table>
{{ $ruangan->links() }}   

@endsection