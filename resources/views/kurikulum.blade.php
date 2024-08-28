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
                        <div class="flex-shrink-0">
                            <button class="btn btn-primary" style="background-color: #A259FF; border-color: #A259FF;">
                                Upload data from your file
                            </button>
                            <p class="text-muted mt-2 mb-0"><small>Your file must be in .csv format</small></p>
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
   <!-- dragdrop ends -->
   <div >
    <h1 class="fs-5" style="margin-left:25px; margin-top:75px;">Dosen Pengampu Matakuliah:</a></h1>
    <hr class= "my-3">
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
                        <th scope="col" class="jumlah-dosen">Jumlah Dosen Pengampu</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pengantar Kecerdasan Buatan</td>
                        <td class="jumlah-dosen">Dua dosen pengampu</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pengantar Kecerdasan Buatan</td>
                        <td class="jumlah-dosen">Dua dosen pengampu</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pengantar Kecerdasan Buatan</td>
                        <td class="jumlah-dosen">Dua dosen pengampu</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pengantar Kecerdasan Buatan</td>
                        <td class="jumlah-dosen">Dua dosen pengampu</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pengantar Kecerdasan Buatan</td>
                        <td class="jumlah-dosen">Dua dosen pengampu</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
   <!-- table ends -->
</body>
</html>