@extends('layout')

@section('konten')

<!-- Dark overlay -->
<div class="overlay"></div>

<div class="bg-full p-4 rounded position-relative overflow-hidden">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">List Kelas</h4>
        <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kelas
        </button>
    </div>

    <div class="table-responsive p-4 rounded">
        <table class="table table-hover align-middle shadow-sm rounded mt-3" style="font-size: 1.1rem;">
            <thead class="table-custom">
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $data)
                    <tr class="table-row-animation">
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary shadow-sm px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalEditKelas{{ $data->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <form action="{{ route('kelas.delete', $data->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    <button class="btn btn-sm btn-danger shadow-sm px-4 py-2">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEditKelas{{ $data->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('kelas.update', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel{{ $data->id }}">Edit Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis</label>
                                            <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
                                        </div>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambahKelas" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('kelas.submit') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <input type="text" name="jenis" class="form-control" required>
                        </div>
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
