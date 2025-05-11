@extends('layout')

@section('konten')

<div class="container py-5">
   <h2 class="mb-5 text-center fw-bold" style="font-size: 2.5rem; color: black;"><span class="fw-bold" style="color: #7e22e5;">Kelola</span> Data Aplikasi</h2>


    <div class="row row-cols-1 row-cols-md-3 g-4">
        @php
            $greys = ['#6c757d', '#495057', '#adb5bd', '#343a40', '#ced4da', '#868e96', '#dee2e6'];
            $dataItems = [
                ['title' => 'Dosen', 'route' => 'dosen.tampil', 'image' => 'dosen.jpg', 'desc' => 'Data dosen yang tersedia.'],
                ['title' => 'Hari', 'route' => 'hari.tampil', 'image' => 'hari.jpg', 'desc' => 'Kelola hari aktif kuliah.'],
                ['title' => 'Jam', 'route' => 'jam.tampil', 'image' => 'jam.jpg', 'desc' => 'Mengatur slot waktu kuliah.'],
                ['title' => 'Kelas', 'route' => 'kelas.tampil', 'image' => 'kelas.jpg', 'desc' => 'Data kelas untuk mahasiswa.'],
                ['title' => 'Mata Kuliah', 'route' => 'matakuliah.tampil', 'image' => 'matakuliah.jpg', 'desc' => 'Daftar mata kuliah yang tersedia.'],
                ['title' => 'Ruangan', 'route' => 'ruangan.tampil', 'image' => 'ruangan.jpg', 'desc' => 'Manajemen ruangan kuliah.'],
            ];
        @endphp

    @foreach ($dataItems as $index => $item)
    <div class="col">
        <div class="card text-center fade-trigger hidden-before-anim shadow border-0 h-100" data-delay="{{ $index * 100 }}">


                <!-- Header with image -->
                <div style="height: 160px; overflow: hidden; border-radius: 1rem 1rem 0 0;">
                    <img src="{{ asset('img/' . $item['image']) }}" alt="Icon" 
                        style="width: 100%; height: 150%; object-fit: cover;">
                </div>


                <!-- Card content -->
                <div class="card-body py-4">
                    <h5 class="card-title mb-1 fw-bold" style="color: black;">{{ $item['title'] }}</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">Kelola data {{ strtolower($item['title']) }}</p>
                    <p class="text-secondary mb-4" style="font-size: 0.85rem;">
                        {{ $item['desc'] }}
                    </p>
                    <a href="{{ route($item['route']) }}" class="btn btn-custom-purple px-4">Kelola</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>

<!-- Styling -->
<style>
    body {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background-color: white;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1rem;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .btn-custom-purple {
        background-color: #A259FF; 
        border: none;
        color: white;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-custom-purple:hover {
        background-color: #7e22e5; 
        transform: scale(1.05);
    }

    .animate__animated {
        animation-duration: 0.8s;
    
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = el.dataset.delay || 0;
                    el.classList.add('animate__animated', 'animate__fadeInUp');
                    el.style.animationDelay = `${delay}ms`;
                    observer.unobserve(el); // only animate once
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.fade-trigger').forEach(el => {
            observer.observe(el);
        });
    });
</script>


<!-- Animate.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
