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
    <!-- {{-- navbar ends --}} -->
    <div >
    <h1 class="title-custom mt-3">Penjadwalan <a>Matakuliah</a></h1>
    </div>
    
    <!--option starts-->
    <div class="container mb-4 mt-5">
  <div class="row align-items-center">
    <div class="col d-flex">
      <div class="me-4 flex-grow-1">
        <select class="form-select">
          <option selected>Pilih program studi...</option>
          <option>S1 Informatika</option>
          <option>S1 Farmasi</option>
          <option>S1 Biologi</option>
          <option>S1 Fisika</option>
        </select>
      </div>
      <div class="flex-grow-1">
        <select class="form-select">
          <option selected>Pilih semester...</option>
          <option>Ganjil</option>
          <option>Genap</option>
        </select>
      </div>
    </div>
    <div class="col d-flex justify-content-end align-items-center mt-3">
      <div class="d-flex gap-2">
        <button class="btn btn-primary" style="width: 120px;">Generate</button>
        <button class="btn btn-danger" style="width: 120px;">Delete</button>
        <button class="btn btn-success" style="width: 120px;">Print</button>
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
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Kode Matakuliah</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Informatika</td>
                            <td>IF22403002</td>
                            <td>Analisis dan Desain Sistem</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Dr. Anak Agung Istri Ngurah Eka Karyawati</td>
                            <td>F</td>
                            <td>Rabu</td>
                            <td>10.30 - 13.00</td>
                            <td>2.2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <!-- table ends -->
</body>
</html>