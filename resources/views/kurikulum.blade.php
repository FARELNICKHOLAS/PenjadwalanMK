<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMIPA - Penjadwalan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar Starts -->
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
                        <a class="nav-link fs-5" href="/" style="color: #FFFFFF; ">Penjadwalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" aria-current="page" href="/dosen" style="color: #FFFFFF;">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/matakuliah" style="color: #FFFFFF;">Matakuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/pengampu" style="color: #FFFFFF;">Pengampu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/kurikulum" style="color: #FFFFFF;">Kurikulum</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse"></div>
        </div>
    </nav>
    <!-- Navbar Ends -->
     
    <div >
    <h1 class="title-custom mt-3">Kurikulum <a>Dosen Pengampu Matakuliah</a></h1>
    </div>
    <div class="d-flex gap-2 justify-content-end mt-3" style="margin-right:75px">
    <a class="btn btn-danger btn-lg" style="width:200px" href="/" role="button">Kembali</a>
      </div>
    <div >
    <h1 class="title-custom mt-5 fs-5">import file (.csv):</a></h1>
    <hr class= "my-3">
    </div>
  <!-- dragdrop starts -->
  <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-4" style="border: 1px dashed #cccccc;">
                    <div class="d-flex align-items-center">
                        <!-- Upload Button Section -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #A259FF; border-color: #A259FF; width: 250px; height: 60px;">
    Upload data from your file
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload your data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <input type="file" name="pengampufile" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" style="background-color: #A259FF; border-color: #A259FF;">Save changes</button>
        </div>
        </div>
        </form>
    </div>
    </div>
 
                        <!-- Divider -->
                        <div class="mx-5" style="border-left: 2px solid #dddddd; height: 100px;"></div>

                        <!-- Text Section -->
                        <div class="flex-grow-1">
                            <p class="mb-0">
                                (Penjelasan terhadap data dan detail file .csv yang harus dibuat dan yang dapat diimport 
                                oleh admin ke dalam page.)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div><p class="description mt-3" >
  Anda juga dapat secara manual menyesuaikan data Dosen dan Matakuliah yang diampu!
</p></div>
   <div class="d-flex">
    <h1 class="fs-5" style="margin-left:25px; margin-top:75px;">Dosen Pengampu Matakuliah:</a></h1>
    <hr class= "my-3">
    </div>
    <div class="col d-flex justify-content-end align-items-center mt-3">
        <form action="{{ route('deletedata') }}" method="POST">
            @csrf
            <button class="btn btn-danger ms-2" style="width:200px; margin-right:75px;">Hapus Semua Data</button>
        </form>
      </div>
  <!-- table starts -->

<div class="container mb-4 mt-5">
    <div class="custom-table-container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="kode-matakuliah">Matakuliah</th>
                        <th scope="col" class="jumlah-dosen">Dosen Pengampu</th>
                        <th scope="col" class="Kelas-ygDiajar">Kelas yang Diajar</th>
                        {{-- <th scope="col">Edit</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $pengajar as $no=>$data)
                    <tr>
                    <td>{{ $data->kode_ajaran }}</td>
                    <td>{{ $data->matkul->nama_matkul }}</td>
                    <td class="jumlah-dosen">{{ $data->dosen->nama }}</td>
                    <td>{{ $data->namakelas->nama }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
   <!-- table ends -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>