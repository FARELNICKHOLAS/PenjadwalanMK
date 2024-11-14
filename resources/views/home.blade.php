<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMIPA - Penjadwalan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body> 
<!-- {{-- navbar starts --}} -->
    <nav class="navbar navbar-expand-lg custom-navbar sticky-top" style="background-color: #465866;">
        <div class="container-fluid">
            <img src="img/logo.png" alt="logo" width="150" height="40">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"></div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 navbar-text" style="margin-left: 130px;">
                <li class="nav-item">
                        <a class="nav-link fs-5" href="/" style="color: #FFFFFF;">Penjadwalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" aria-current="page" href="/dosen" style="color: #FFFFFF;">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/matakuliah" style="color: #FFFFFF;">Matakuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/kurikulum" style="color: #FFFFFF;">Kurikulum</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse"></div>
        </div>
    </nav>
    <!-- {{-- navbar ends --}} -->
    <div >
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
        <form action="{{ route('jadwal.generate') }}"  method="POST">
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
        <form action="{{ route('jadwal.cetak') }}" method="GET">
            <button class="btn btn-success" style="width: 120px;">Print</button>
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
     <!-- table ends -->
</body>
</html>