@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Jam</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{route('jam.tambah')}}">Tambahkan Jam</a>
    </div>
</div>



<table class="table">
    <tr>
        <th>Plotting Jam</th>
        <th>Aksi</th>
    </tr>
    @foreach($jam as $no=>$data)
    <tr>
        <td>{{$data->sesi}}</td>
        <td><a href="{{ route('jam.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('jam.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach   
</table>

@endsection