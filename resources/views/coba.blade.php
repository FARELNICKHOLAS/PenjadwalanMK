@extends('layout')

@section('konten')

<h1>Menu Coba algoritma</h1>
<form action="{{ route('coba.generate') }}">
    <button class="btn btn-primary" style="width: 120px;">Generate</button>
</form>

<div class="container mb-4 mt-5">
    <div class="custom-table-container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode Matakuliah</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Dosen</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jadwal != null)
                    @php $i = 1; @endphp
                    @foreach ( $jadwal as $no => $data )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->pengajar->matkul->kode_matkul }}</td>
                        <td>{{ $data->pengajar->matkul->nama_matkul }}</td>
                        <td>{{ $data->pengajar->matkul->sks }}</td>
                        <td>{{ $data->pengajar->kelas }}</td>
                        <td>{{ $data->pengajar->dosen->nama }}</td>
                        <td>{{ $data->hari->nama }}</td>
                        <td>{{ $data->jam->sesi }}</td>
                        <td>{{ $data->ruangan->nama_ruangan }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection