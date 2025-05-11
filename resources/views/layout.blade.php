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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>

</head>
<body>
    <!-- Navbar Starts -->
    <nav class="navbar navbar-expand-lg custom-navbar sticky-top" style="background-color: #465866;">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo2.png') }}" alt="logo" width="240" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 navbar-text">
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ Request::is('/') ? 'active' : '' }}" href="/">Penjadwalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ Request::is('kurikulum') ? 'active' : '' }}" href="/kurikulum">Kurikulum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ Request::is('kelola') ? 'active' : '' }}" href="/kelola">Kelola</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Ends -->

    <div class="container mt-4">
        @yield('konten')
    </div>

    <style>
.navbar-nav .nav-link {
    color: #ffffff !important;
    font-weight: 300;
    position: relative;
    display: inline-block;
    padding-bottom: 5px;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 3px;
    background-color: #ffffff;
    transition: width 0.4s ease-in-out;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

/* Keep the underline for the active link */
.navbar-nav .nav-link.active::after {
    width: 100%;
    background-color: #ffffff;
}
    </style>
    <!-- Tambahkan Bootstrap JS agar navbar collapse berfungsi -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
