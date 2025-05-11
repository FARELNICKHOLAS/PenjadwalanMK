@extends('layout')

@section('konten')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Dark overlay -->
<div class="overlay"></div>

<div class="bg-full p-4 rounded position-relative overflow-hidden">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">List Jam</h4>
        <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahJam">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jam
        </button>
    </div>

    <div class="table-responsive p-4 rounded" style="max-width: 100%;">
        <table class="table table-hover align-middle shadow-sm rounded mt-3" style="width: 100%; font-size: 1.1rem;">
            <thead class="table-custom">
                <tr>
                    <th>Plotting Jam</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jam as $no => $data)
                    <tr class="table-row-animation">
                        <td>{{ $data->sesi }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary shadow-sm px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalEditJam{{ $data->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <form action="{{ route('jam.delete', $data->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm px-4 py-2">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Jam -->
                    <div class="modal fade" id="modalEditJam{{ $data->id }}" tabindex="-1" aria-labelledby="modalEditJamLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('jam.update', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditJamLabel{{ $data->id }}">Edit Jam</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="sesi{{ $data->id }}" class="form-label">Plotting Jam</label>
                                            <input type="text" class="form-control" name="sesi" id="sesi{{ $data->id }}" value="{{ $data->sesi }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

    <!-- Modal Tambah Jam -->
    <div class="modal fade" id="modalTambahJam" tabindex="-1" aria-labelledby="modalTambahJamLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jam.submit') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahJamLabel">Tambah Jam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sesi" class="form-label">Plotting Jam</label>
                            <input type="text" class="form-control" name="sesi" required>
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
