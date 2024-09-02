@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Sesi Ajar</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{route('pengampu.tambah')}}">Tambah Sesi Ajar</a>
    </div>
</div>



<table class="table">
    <tr>
        <th>Kode Ajaran</th>
        <th>Ruang kelas</th>
        <th>Aksi</th>
    </tr>

    {{-- {{ dd($pengampu); }} --}}
    @foreach($pengampu as $no=>$data)
    <tr>
        <td>{{$data->pengajar->kode_ajaran}}</td>
        <td>{{$data->ruangan->nama_ruangan}}</td>
        <td class="d-flex"><a href="{{ route('pengampu.edit', $data->id) }}" class="btn btn-primary">Edit</a>
            <form action=" {{ route('pengampu.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-danger ms-2">Delete</button>
            </form>
        </td>  
        
    </tr>
    @endforeach
</table> 

@endsection