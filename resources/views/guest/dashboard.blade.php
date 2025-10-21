<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- MENGGUNAKAN ROUTE YANG TEPAT UNTUK DASHBOARD --}}
    <title>Dashboard - Bina Desa | Portal Layanan Mandiri dan Administrasi Surat Desa</title>
    <meta name="description" content="Portal Layanan Mandiri dan Administrasi Surat Desa.">
    <meta name="keywords" content="Bina Desa, Layanan Mandiri, Surat Desa, Administrasi Desa">

    {{-- ASSET LINKS --}}
    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- GOOGLE FONTS (TETAP) --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- CSS VENDOR --}}
    <link href="{{asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets-guest/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    {{-- MAIN CSS --}}
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    {{-- INLINE STYLE (Disarankan dipindahkan ke assets-guest/css/custom.css jika sudah stabil) --}}
    <style>
        /* Header Social Links - Tambahkan jarak minimal di antara ikon */
        .header-social-links a {
            margin-left: 15px;
        }

        /* Footer Social Links - Tambahkan jarak minimal di antara ikon */
        .footer .social-links a {
            margin-right: 15px; /* Jarak antara ikon di footer */
        }

        /* Custom Hero for better visibility, keeping the structure */
        .blog-hero-content {
            /* Tambahkan background agar teks lebih terbaca di atas gambar */
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 5px;
        }
        .blog-hero-content h1, .blog-hero-content .category {
            color: white !important;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        /* START: Custom Styling for Quick Request Section */
        .quick-request-section {
            background-color: #f4f7fa; /* Light Gray - to make it stand out */
            padding: 80px 0;
        }
        .quick-request-card {
            border-left: 5px solid #ffc107; /* Yellow accent line */
        }
        /* END: Custom Styling for Quick Request Section */
    </style>

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            {{-- LINK HOME: Menggunakan route('guest.dashboard') --}}
            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    {{-- PERBAIKAN: Gunakan route() Layanan Mandiri Login, pastikan Anda menggunakan nama route yang benar di routes/web.php --}}
                    <li><a href="{{ route('guest.layanan_mandiri.login') }}" class="active">Layanan Mandiri</a></li>

                    {{-- ROUTE JENIS SURAT --}}
                    <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>

                    {{-- PERBAIKAN: Mengganti # dengan route yang akan digunakan di masa depan, atau tetap # --}}
                    <li><a href="#permohonan">Permohonan Surat</a></li>
                    <li><a href="#berkas">Berkas Persyaratan</a></li>
                    <li><a href="#status">Riwayat Status Surat</a></li>
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

    <main class="main">

        <section id="blog-hero" class="blog-hero section">

            <div class="container-fluid p-0" data-aos="fade">

                <div class="blog-hero-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 1000,
                            "effect": "fade",
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": 1,
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            }
                        }
                    </script>

                    <div class="swiper-wrapper">
                        {{-- SLIDE 1 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard1.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">LAYANAN SURAT</span>
                                    <h1>Ajukan Surat Keterangan Usaha (SKU) dengan Cepat dan Mudah</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">Hari Ini</span>
                                        <span class="read-time">3 Menit</span>
                                        <span class="views">2.5k views</span>
                                    </div>
                                    <a href="#permohonan" class="read-more">Ajukan Sekarang <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 2 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard2.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">ADMINISTRASI PENDUDUK</span>
                                    <h1>Cek Data Kependudukan dan Kartu Keluarga Anda secara Mandiri</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">Kemarin</span>
                                        <span class="read-time">4 Menit</span>
                                        <span class="views">2.3k views</span>
                                    </div>
                                    {{-- PERBAIKAN UTAMA: Arahkan ke Login Layanan Mandiri --}}
                                    <a href="{{ route('guest.layanan_mandiri.login') }}" class="read-more">Login Layanan Mandiri <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 3 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard3.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">INFORMASI DESA</span>
                                    <h1>Syarat dan Ketentuan Lengkap Permohonan Surat Domisili</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">2 Hari Lalu</span>
                                        <span class="read-time">5 Menit</span>
                                        <span class="views">3.1k views</span>
                                    </div>
                                    <a href="#berkas" class="read-more">Cek Persyaratan <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 4 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard4.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">PELAYANAN PUBLIK</span>
                                    <h1>Cara Lacak Status Surat Permohonan Anda Online 24 Jam</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">3 Hari Lalu</span>
                                        <span class="read-time">4 Menit</span>
                                        <span class="views">2.7k views</span>
                                    </div>
                                    <a href="#status" class="read-more">Lacak Status Surat <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 5 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard5.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">INOVASI DESA</span>
                                    <h1>Pemanfaatan Teknologi Digital untuk Pelayanan Publik yang Lebih Baik</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">5 Hari Lalu</span>
                                        <span class="read-time">3 Menit</span>
                                        <span class="views">2.5k views</span>
                                    </div>
                                    <a href="blog-details.html" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

            </div>

        </section>

        {{-- BAGIAN QUICK ACCESS LAYANAN --}}
        <section id="category-section" class="category-section section">

            <div class="container section-title" data-aos="fade-up">
                <span class="description-title">LAYANAN MANDIRI & SURAT</span>
                <h2>Akses Cepat Layanan Administrasi</h2>
                <p>Ajukan surat atau cek status permohonan Anda dengan cepat.</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 mb-5 justify-content-center">
                    {{-- KOTAK AJUKAN PERMOHONAN SURAT --}}
                    <div class="col-lg-8">
                        <article class="hero-post p-4 shadow" data-aos="zoom-out" data-aos-delay="200" style="border-radius: 8px; background-color: #f8f9fa;">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <i class="bi bi-envelope-check display-3 text-primary"></i>
                                </div>
                                <div class="col-md-9">
                                    <div class="post-content">
                                        <h2 class="post-title mb-2">
                                            <a href="#permohonan">Ajukan Permohonan Surat Online</a>
                                        </h2>
                                        <p class="post-excerpt">
                                            Mulai pengajuan surat keterangan, domisili, atau surat lainnya dari mana saja dan kapan saja.
                                        </p>
                                        <a href="#permohonan" class="btn btn-primary mt-2">
                                            Mulai Ajukan Surat <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- KOTAK CEK STATUS SURAT --}}
                    <div class="col-lg-4">
                        <div class="sidebar-posts">
                            <article class="sidebar-post p-3 shadow-sm h-100" data-aos="fade-left" data-aos-delay="300" style="border-radius: 8px; background-color: #ffffff;">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <i class="bi bi-search display-6 text-warning"></i>
                                    </div>
                                    <div class="col-9">
                                        <div class="post-content">
                                            <h5 class="title mb-1">
                                                <a href="#status">Cek Status Surat</a>
                                            </h5>
                                            <p class="text-muted small mb-0">Lacak perkembangan surat permohonan Anda.</p>
                                            <a href="#status" class="btn btn-sm btn-warning mt-2">
                                                Cek Status <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- KOTAK BERKAS PERSYARATAN --}}
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <article class="grid-post p-3 shadow-sm h-100" style="border-radius: 8px; background-color: #ffffff;">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-file-earmark-text display-6 text-success me-3"></i>
                                <div>
                                    <h5 class="title mb-1">
                                        <a href="#berkas">Berkas Persyaratan</a>
                                    </h5>
                                    <p class="text-muted small mb-0">Lihat dokumen yang diperlukan.</p>
                                    <a href="#berkas" class="stretched-link"></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- KOTAK DAFTAR JENIS SURAT --}}
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <article class="grid-post p-3 shadow-sm h-100" style="border-radius: 8px; background-color: #ffffff;">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-list-columns-reverse display-6 text-info me-3"></i>
                                <div>
                                    <h5 class="title mb-1">
                                        <a href="{{ route('jenis-surat.index') }}">Daftar Jenis Surat</a>
                                    </h5>
                                    <p class="text-muted small mb-0">Lihat semua jenis surat yang tersedia.</p>
                                    <a href="{{ route('jenis-surat.index') }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- KOTAK LAYANAN MANDIRI (LOGIN) --}}
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <article class="grid-post p-3 shadow-sm h-100" style="border-radius: 8px; background-color: #ffffff;">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-lock display-6 text-danger me-3"></i>
                                <div>
                                    <h5 class="title mb-1">
                                        {{-- PERBAIKAN UTAMA: Arahkan ke Login Layanan Mandiri --}}
                                        <a href="{{ route('guest.layanan_mandiri.login') }}">Layanan Mandiri (Login)</a>
                                    </h5>
                                    <p class="text-muted small mb-0">Akses data keluarga dan kependudukan.</p>
                                    {{-- PERBAIKAN UTAMA: Arahkan ke Login Layanan Mandiri --}}
                                    <a href="{{ route('guest.layanan_mandiri.login') }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    {{-- LINK HOME: Menggunakan route('guest.dashboard') --}}
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
                        {{-- LINK HOME: Menggunakan route('guest.dashboard') --}}
                        <li><a href="{{ route('guest.dashboard') }}">Home</a></li>
                        {{-- PERBAIKAN UTAMA: Arahkan ke Login Layanan Mandiri --}}
                        <li><a href="{{ route('guest.layanan_mandiri.login') }}">Layanan Mandiri</a></li>
                        <li><a href="#permohonan">Permohonan Surat</a></li>
                        <li><a href="#status">Lacak Status Surat</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#">Berita Desa</a></li>
                        <li><a href="#berkas">Berkas Persyaratan</a></li>
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

    {{-- JAVASCRIPT ASSET LINKS --}}
    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

</body>

</html>
