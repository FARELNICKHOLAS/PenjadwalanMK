@extends('layout')

@section('konten')
<div>
    <h1 class="title-custom mt-3">Penjadwalan <a>Matakuliah</a></h1>
</div>

<!--option starts-->
<div class="container mb-4 mt-5">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class="me-4 flex-grow-1">
                @csrf
                <select class="form-select">
                    <option selected disabled>Pilih program studi...</option>
                    <option>S1 Informatika</option>
                    <option>S1 Farmasi</option>
                    <option>S1 Biologi</option>
                    <option>S1 Fisika</option>
                </select>
            </div>
            <div class="flex-grow-1">
                <form action="{{ route('jadwal.generate') }}" method="POST">
                    @csrf
                    <select class="form-select" name="semester">
                        <option selected disabled>Pilih semester...</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
            </div>
        </div>
        <div class="col d-flex justify-content-end align-items-center mt-3">
            <div class="d-flex gap-2">
                <button class="btn btn-primary" style="width: 120px;">Generate</button>
                </form>
                <form action="{{ route('jadwal.delete') }}">
                    <button class="btn btn-danger" style="width: 120px;">Delete</button>
                </form>
                <form>
                    <button onclick="printJadwal('jadwalToPrint')" class="btn btn-success" id="printBtn" style="width: 120px;">Print</button>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-4 custom-hr">
</div>
<!--option ends-->

<!-- table starts -->
    <div class="container mb-4 mt-5">
        <div class="custom-table-container">
            <div class="table-responsive">
                @if(session('pengajarHilang'))
                    <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
                        <img src="{{ asset('img\warning.svg') }}" alt="Icon Peringatan" width="32" height="32" class="bi me-2">
                        <div>
                            <strong> ID Pengajar yang Hilang:</strong> {{ implode(', ', session('pengajarHilang')) }}
                            <p class="mb-0"><strong>Saran:</strong> <span><em> Generate Ulang Jadwal!</em></span></p>
                        </div>
                    </div>
                @endif

                @php
                    $listSemester = [];
                    if ($semester % 2 != 0) {
                        $listSemester = [1, 3, 5, 7];
                    }else {
                        $listSemester = [2, 4, 6];
                    }
                @endphp
                <div id="jadwalToPrint">
                    @foreach ( $listSemester as $smt)
                    <h3>Semester {{ $smt }}</h3>
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
                            @foreach ( $jadwal as $no=>$data )
                                @if ($data->pengajar->matkul->semester == $smt)
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
                                @endif
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
     <!-- table ends -->
    <script>
        function printJadwal(jadwalToPrint) {
            var printContents = document.getElementById(jadwalToPrint).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
