@extends('layout')

@section('konten')
<h4>Edit Data Pengampu</h4>
<form action="{{ route ('pengampu.update', $pengampu->id) }}" method="post">
    @csrf
    @method('POST')
    <div class="dropdownPengajar">
        <label for="pengampu">Kode Ajaran</label>
        <div class="selectPengajar">
            <select name="idPengajar" id="idPengajar">
                <option value="{{ $pengampu->pengajar->id }}">{{ $pengampu->pengajar->kode_ajaran }}</option>
                @foreach ( $pengajar as $no=>$data )
                @if ($data->id == $pengampu->pengajar->id)
                    @continue {{-- lewati iterasi --}}
                @else
                <option value="{{ $data->id }}">{{ $data->kode_ajaran }}</option>
                @endif
                @endforeach
            </select> 
        </div>
    </div>
    <div class="dropdownRKelas">
        <label for="pengampu">Ruangan</label>
        <div class="selectRKelas">
            <select name="ruangkelas" id="ruangkelas">
                <option value="{{ $pengampu->ruangan->id }}">{{ $pengampu->ruangan->nama_ruangan }}</option>
                @foreach ( $ruangan as $no=>$data )
                @if ($data->id == $pengampu->ruangan->id)
                    @continue {{-- lewati iterasi --}}
                @else
                <option value="{{ $data->id }}">{{ $data->nama_ruangan }}</option>
                @endif
                @endforeach
            </select> 
        </div>
    </div>
    <div class="buttn d-flex">
        <button class='btn btn-outline-dark mt-2'>Edit</button>
        <a href="{{ route('pengampu.tampil') }}" class='btn btn-danger mt-2 ms-1'>Cancel</a>
    </div>
</form>
@endsection