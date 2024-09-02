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
        <td class="flex-auto">
        <div style="display: flex; gap: 20px;">
            <a href="{{ route('jam.edit', $data->id) }}" class="btn btn-primary mb-3" style="width: 100px;">Edit</a>
            <form action="{{ route('jam.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger" style="width: 100px;">Delete</button>
            </form>
        </div>
</td>
    @endforeach   
</table>

@endsection