@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Dosen</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{route('dosen.tambah')}}">Tambah Dosen</a>
    </div>
</div>



<table class="table">
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama Dosen</th>
        <th>Aksi</th>
    </tr>
    @foreach($dosen as $no=>$data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->nip}}</td>
        <td>{{$data->nama}}</td>
        <td><a href="{{ route('dosen.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('dosen.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach   
</table>
{{ $dosen->links() }}

@endsection