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
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar Starts -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #465866;">
  <div class="container-fluid">
  <img class="logo" src="img/logo.png" alt="logo"> 
    </nav>
    <!-- Navbar Ends -->
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
        <button class="btn btn-primary">Buat</button>
        <button class="btn btn-secondary">Ubah</button>
        <button class="btn btn-danger">Hapus</button>
        <button class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
  <hr class="my-4 custom-hr">
</div>
<div class="col d-flex justify-content-start mt-3"   style="padding-left: 120px;">
      <div class="d-flex gap-2">
        <img src="img/icon.png" alt="icon" style="width: 35px">
        <a class="btn btn-outline-dark" style="width:150px" href="/kurikulum" role="button">Pilih Matakuliah</a>
        <button class="btn btn-outline-dark" style="width: 150px">Pilih Ruangan</button>
      </div>
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