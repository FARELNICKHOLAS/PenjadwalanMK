@extends('layout')

@section('konten')
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $pengajar as $no=>$data)
                    <tr>
                    <td>{{ $data->kode_ajaran }}</td>
                    <td>{{ $data->matkul->nama_matkul }}</td>
                    <td class="jumlah-dosen">{{ $data->dosen->nama }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
   <!-- table ends -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
