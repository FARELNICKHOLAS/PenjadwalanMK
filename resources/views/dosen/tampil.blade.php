@extends('layout')

@section('konten')
<div class="bg-full p-4 rounded position-relative overflow-hidden">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">List Dosen</h4>
        <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahDosen">
            <i class="bi bi-plus-circle me-1"></i> Tambah Dosen
        </button>
    </div>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('dosen.tampil') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="searchname" class="form-control" placeholder="Cari Nama Dosen" value="{{ request('searchname') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="searchnip" class="form-control" placeholder="Cari NIP" value="{{ request('searchnip') }}">
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-outline-primary">
                <i class="bi bi-search"></i> Cari
            </button>
            <a href="{{ route('dosen.tampil') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-repeat"></i> Reset
            </a>
        </div>
    </form>

    <div class="table-responsive p-4 rounded style=max-width: 100%;">
        <table class="table table-hover align-middle shadow-sm rounded mt-3" style="width: 100%; font-size: 1.1rem;">
            <thead class="table-custom">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosen as $no => $data)
                    <tr class="table-row-animation">
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary shadow-sm px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalEditDosen{{ $data->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <form action="{{ route('dosen.delete', $data->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm px-4 py-2">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Dosen -->
                    <div class="modal fade" id="modalEditDosen{{ $data->id }}" tabindex="-1" aria-labelledby="modalEditDosenLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('dosen.update', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditDosenLabel{{ $data->id }}">Edit Dosen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nipdosen{{ $data->id }}" class="form-label">NIP</label>
                                            <input type="text" class="form-control" name="nipdosen" id="nipdosen{{ $data->id }}" value="{{ $data->nip }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen{{ $data->id }}" class="form-label">Nama Dosen</label>
                                            <input type="text" class="form-control" name="namadosen" id="namadosen{{ $data->id }}" value="{{ $data->nama }}" required>
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

    <!-- Modal Tambah Dosen -->
    <div class="modal fade" id="modalTambahDosen" tabindex="-1" aria-labelledby="modalTambahDosenLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dosen.submit') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahDosenLabel">Tambah Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nipdosen" class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nipdosen" required>
                        </div>
                        <div class="mb-3">
                            <label for="namadosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="namadosen" required>
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

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $dosen->appends(request()->query())->links() }}
    </div>

    {{-- Row hover CSS --}}
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

</div> {{-- end bg-full --}}
@endsection
