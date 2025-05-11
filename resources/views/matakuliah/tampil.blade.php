@extends('layout')

@section('konten')

<!-- Dark overlay -->
<div class="overlay"></div>

<div class="bg-full p-4 rounded position-relative overflow-hidden">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">List Matakuliah</h4>
        <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahMatkul">
            <i class="bi bi-plus-circle me-1"></i> Tambah Matakuliah
        </button>
    </div>

    {{-- Search Form --}}
    <form action="/matakuliah" method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="search" name="search" class="form-control" placeholder="Cari Matakuliah..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-outline-primary">
                <i class="bi bi-search"></i> Cari
            </button>
            <a href="{{ route('matakuliah.tampil') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-repeat"></i> Reset
            </a>
        </div>
    </form>

    <div class="table-responsive p-4 rounded" style="max-width: 100%;">
        <table class="table table-hover align-middle shadow-sm rounded mt-3" style="width: 100%; font-size: 1.1rem;">
            <thead class="table-custom">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>Tipe</th>
                    <th>Semester</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matakuliah as $data)
                    <tr class="table-row-animation">
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->kode_matkul }}</td>
                        <td>{{ $data->nama_matkul }}</td>
                        <td>{{ $data->sks }}</td>
                        <td>{{ $data->tipe }}</td>
                        <td>{{ $data->semester }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary shadow-sm px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalEditMatkul{{ $data->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <form action="{{ route('matakuliah.delete', $data->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    <button class="btn btn-sm btn-danger shadow-sm px-4 py-2">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Matakuliah -->
                    <div class="modal fade" id="modalEditMatkul{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('matakuliah.update', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel{{ $data->id }}">Edit Matakuliah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Kode</label>
                                        <input type="text" name="kode" value="{{ $data->kode_matkul }}" class="form-control mb-2">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="{{ $data->nama_matkul }}" class="form-control mb-2">
                                        <label>SKS</label>
                                        <input type="number" name="sks" value="{{ $data->jenis_semester }}" class="form-control mb-2">
                                        <label>Jenis Semester</label>
                                        <input type="number" name="sks" value="{{ $data->sks }}" class="form-control mb-2">
                                        <label>Tipe</label>
                                        <input type="text" name="tipe" value="{{ $data->tipe }}" class="form-control mb-2">
                                        <label>Semester</label>
                                        <input type="number" name="semester" value="{{ $data->semester }}" class="form-control mb-2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $matakuliah->links() }}
    </div>

    <!-- Modal Tambah Matakuliah -->
    <div class="modal fade" id="modalTambahMatkul" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('matakuliah.submit') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Tambah Matakuliah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control mb-2" required>
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control mb-2" required>
                        <label>SKS</label>
                        <input type="number" name="sks" class="form-control mb-2" required>
                        <label>Jenis Semester</label>
                        <input type="text" name="jenis" class="form-control mb-2" required>
                        <label>Tipe</label>
                        <input type="text" name="tipe" class="form-control mb-2" required>
                        <label>Semester</label>
                        <input type="number" name="semester" class="form-control mb-2" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
    .modal-backdrop {
        z-index: 1040 !important;
    }

    .modal {
        z-index: 1050 !important;
    }

    body {
        background-image: url('img/database_img.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        position: relative;
    }

    .bg-full {
        position: relative;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
    }

    .table-row-animation {
        transition: background-color 0.3s ease;
    }

    .table-row-animation:hover {
        background-color: #f9f9f9;
    }

    .table-custom {
        background-color: #007bff;
        color: white;
    }   
    </style>
</div>

@endsection
