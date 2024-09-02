@extends('layout')

@section('konten')
<h4>Tambah Sesi Ajar</h4>
<form action="{{ route ('pengampu.submit') }}" method="post">
    @csrf
    <div class="dropdownPengajar">
        <label>Kode Ajaran</label>
        <div class="selectPengajar">
            <select name="idPengajar" id="pengajar_id">
                <option value="">Pilih Kode Ajaran</option>
                @foreach ( $pengajar as $no=>$data )
                <option value="{{ $data->id }}">{{ $data->kode_ajaran }}</option>
                @endforeach
            </select> 
        </div>
    </div>
    <div class="dropdownRKelas">
        <label>Ruangan</label>
        <div class="selectRKelas">
            <select name="ruangkelas" id="ruang_kelas">
                <option value="">Pilih Ruangan</option>
                @foreach ( $ruangan as $no=>$data )
                <option value="{{ $data->id }}">{{ $data->nama_ruangan }}</option>
                @endforeach
            </select> 
        </div>
    </div>
    <div class="buttn d-flex">
        <button class='btn btn-outline-dark mt-2'>Tambah</button>
        <a href="{{ route('pengampu.tampil') }}" class='btn btn-danger mt-2 ms-1'>Cancel</a>
    </div>
</form>
@endsection