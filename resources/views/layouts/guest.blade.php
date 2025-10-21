<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- DYNAMIC TITLE (Diambil dari halaman child) --}}
    <title>@yield('title', 'Portal Layanan Desa')</title>
    <meta name="description" content="@yield('description', 'Portal Layanan Mandiri dan Administrasi Surat Desa.')">
    <meta name="keywords" content="Bina Desa, Layanan Mandiri, Surat Desa, Administrasi Desa">

    {{-- Favicons --}}
    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    {{-- Template Main CSS File (Ini adalah style.css Story Theme Anda) --}}
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    {{-- KUSTOM CSS KHUSUS (Dari Dashboard lama Anda) --}}
    <style>
        /* Perbaikan Styling Ikon Sosial Media */
        .header-social-links a { margin-left: 15px; }
        .footer .social-links a { margin-right: 15px; }

        /* Custom Hero for better visibility */
        .blog-hero-content {
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 5px;
        }
        .blog-hero-content h1, .blog-hero-content .category {
            color: white !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        /* Custom Styling for Quick Request Section */
        .quick-request-section {
            background-color: #f4f7fa;
            padding: 80px 0;
        }
        .quick-request-card {
            border-left: 5px solid #ffc107;
        }

        {{-- Ini adalah tempat untuk CSS tambahan dari halaman child (misal: Jenis Surat) --}}
        @yield('custom_css')
    </style>

</head>

<body class="index-page">

    {{-- ==================== HEADER ==================== --}}
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    {{-- Navigasi Anda --}}
                    <li><a href="#" class="{{ request()->routeIs('guest.dashboard') ? 'active' : '' }}">Layanan Mandiri</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}" class="{{ request()->routeIs('jenis-surat.index') ? 'active' : '' }}">Jenis Surat</a></li>
                    <li><a href="#">Permohonan Surat</a></li>
                    <li><a href="#">Berkas Persyaratan</a></li>
                    <li><a href="#">Riwayat Status Surat</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    {{-- ==================== KONTEN DINAMIS UTAMA ==================== --}}
    <main class="main">
        @yield('content')
    </main>

    {{-- ==================== FOOTER ==================== --}}
    <footer id="footer" class="footer position-relative">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Bina Desa</span>
                    </a>
                    <p>Portal Layanan Mandiri dan Administrasi Surat Desa. Membantu masyarakat mengurus keperluan administrasi secara cepat, transparan, dan terintegrasi secara digital.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Navigasi Cepat</h4>
                    <ul>
                        <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                        <li><a href="#">Layanan Mandiri</a></li>
                        <li><a href="#">Permohonan Surat</a></li>
                        <li><a href="#">Lacak Status Surat</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#">Berita Desa</a></li>
                        <li><a href="#">Berkas Persyaratan</a></li>
                        <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>Kantor Kepala Desa</p>
                    <p>Jl. Utama Desa No. 10</p>
                    <p>Kode Pos 535022</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@binadesa.go.id</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center">
            <p>© <span>Copyright</span><strong class="px-1 sitename">Bina Desa</strong><span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    {{-- Vendor JS Files --}}
    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/noframework.waypoints.js') }}"></script>

    {{-- Template Main JS File --}}
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    {{-- JS Tambahan dari halaman child (jika ada) --}}
    @yield('custom_js')

</body>

</html>
