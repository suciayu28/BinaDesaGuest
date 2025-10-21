<!DOCTYPE html>
<html lang="en">

<head>
    {{-- (Header, Meta, dan Link Assets di sini tetap sama seperti yang saya berikan sebelumnya) --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Jenis Surat - Bina Desa</title>
    <meta name="description" content="Halaman daftar jenis surat permohonan layanan mandiri desa.">
    <meta name="keywords" content="surat desa, permohonan, layanan mandiri">

    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    <style>
        .jenis-surat-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .jenis-surat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            color: var(--primary-color, #0d6efd);
            line-height: 1;
        }

        .lead-intro {
            font-size: 1.15rem;
            color: #555;
        }

        /* --- CSS Tambahan untuk Syarat Modal --- */
        .modal-header {
            border-bottom: 1px solid #eee;
            background-color: #f7f7f7;
        }

        /* Styling List Item Syarat */
        .modal-body .list-group-item {
            border-left: 3px solid #0d6efd; /* Garis biru di kiri */
            border-right: none;
            border-top: none;
            padding-left: 15px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        /* Hover/Focus pada List Item */
        .modal-body .list-group-item:hover {
            background-color: #f8f9fa;
        }

        /* Penyesuaian Alert di Modal */
        .modal-body .alert {
            font-size: 1rem;
        }
    </style>
</head>

<body class="about-page">

    {{-- === HEADER / NAVBAR === --}}
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            {{-- LOGO BRANDING (Route Disesuaikan) --}}
            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>

            {{-- NAVMENU (Route Diperbaiki) --}}
            <nav id="navmenu" class="navmenu">
                <ul>
                    {{-- PERBAIKAN: Mengarahkan 'Layanan Mandiri' ke dashboard --}}
                    <li><a href="{{ route('guest.dashboard') }}">Layanan Mandiri</a></li>
                    {{-- Link 'Jenis Surat' tetap aktif di halaman ini --}}
                    <li><a href="{{ route('jenis-surat.index') }}" class="active">Jenis Surat</a></li>
                    {{-- Gunakan '#' untuk rute yang belum didefinisikan --}}
                    <li><a href="#">Permohonan Surat</a></li>
                    <li><a href="#">Berkas Persyaratan</a></li>
                    <li><a href="#">Riwayat Status Surat</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- (Social Links) --}}
            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    <main class="main">

        {{-- === PAGE TITLE / BREADCRUMBS === --}}
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Daftar Jenis Surat</h1>
                            <p class="mb-0">Pilih jenis surat yang Anda butuhkan untuk memulai proses permohonan online.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="current">Jenis Surat</li>
                    </ol>
                </div>
            </nav>
        </div><section id="jenis-surat-content" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        {{-- TOMBOL KEMBALI DI HEADER KONTEN (Perbaikan Route) --}}
                        <div class="d-flex justify-content-end mb-4">
                            <a href="{{ route('guest.dashboard') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
                            </a>
                        </div>

                        <p class="text-center mb-5 lead-intro">
                            Telusuri daftar lengkap surat yang tersedia. Klik **Ajukan Permohonan** untuk memulai proses pengisian formulir dan syarat administrasi.
                        </p>

                        <div class="row g-4">

                            {{-- CARD LOOP DENGAN MODAL SYARAT --}}
                            @forelse ($jenisSurats as $surat)
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 150 }}">
                                <article class="card p-4 h-100 jenis-surat-card">
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-start">
                                            {{-- ICON: Menggunakan default jika tidak ada kolom 'icon' --}}
                                            <i class="bi {{ $surat->icon ?? 'bi-file-earmark-text-fill' }} me-4 flex-shrink-0 card-icon"></i>

                                            <div>
                                                {{-- KODE SURAT --}}
                                                @if ($surat->kode)
                                                    <span class="badge bg-secondary mb-2 rounded-pill">KODE: {{ $surat->kode }}</span>
                                                @endif

                                                <h4 class="card-title mt-1 mb-2">
                                                    {{-- NAMA SURAT --}}
                                                    {{ $surat->nama_jenis }}
                                                </h4>
                                                {{-- DESKRIPSI (Tambahkan kolom ini di DB atau gunakan deskripsi default) --}}
                                                <p class="card-text text-muted small mb-4">{{ $surat->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>

                                                <div class="mt-2">
                                                    {{-- TOMBOL AJUKAN PERMOHONAN --}}
                                                    <a href="#" class="btn btn-sm btn-primary me-2 shadow-sm rounded-pill px-3">
                                                        <i class="bi bi-box-arrow-in-right me-1"></i> Ajukan Permohonan
                                                    </a>

                                                    {{-- TOMBOL LIHAT SYARAT (TRIGGER MODAL) --}}
                                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#syaratModal{{ $surat->jenis_id }}">
                                                        <i class="bi bi-card-checklist me-1"></i> Lihat Syarat
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <div class="modal fade" id="syaratModal{{ $surat->jenis_id }}" tabindex="-1" aria-labelledby="syaratModalLabel{{ $surat->jenis_id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="syaratModalLabel{{ $surat->jenis_id }}">Syarat Permohonan: {{ $surat->nama_jenis }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- Memastikan data syarat_json ada dan bukan array kosong --}}
                                            @if (isset($surat->syarat_json) && is_array($surat->syarat_json) && count($surat->syarat_json) > 0)
                                                <p class="text-muted">Berikut adalah dokumen dan persyaratan yang harus dipenuhi:</p>
                                                <ul class="list-group list-group-flush">
                                                    {{-- Loop untuk menampilkan setiap syarat --}}
                                                    @foreach ($surat->syarat_json as $syarat)
                                                        <li class="list-group-item">{{ $syarat }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Belum ada daftar persyaratan yang ditentukan untuk surat ini.
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="#" class="btn btn-primary">Ajukan Permohonan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12" data-aos="fade-up">
                                <div class="alert alert-info text-center py-4 rounded-3 shadow-sm">
                                    <i class="bi bi-info-circle-fill me-1"></i> Maaf, saat ini belum ada jenis surat yang dapat diajukan.
                                </div>
                            </div>
                            @endforelse

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- (Footer dan Script di sini tetap sama seperti yang saya berikan sebelumnya) --}}
    <footer id="footer" class="footer position-relative">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Bina Desa</span>
                    </a>
                    <p>Portal Layanan Mandiri dan Administrasi Surat Desa. Membantu masyarakat mengurus keperluan administrasi secara cepat, transparan, dan terintegrasi secara digital.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
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

    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>

</html>
