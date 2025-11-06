@extends('layouts.guest.app')
@section('content')
    {{-- START MAIN CONTENT --}}
    <main class="main">
        {{-- Area Flash Messages (Login Success, Logout Warning, dll) --}}
        <div class="container mt-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i> {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- Hero Slider Section --}}
        <section id="blog-hero" class="blog-hero section">
            <div class="container-fluid p-0" data-aos="fade">
                <div class="blog-hero-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 1000,
                            "effect": "fade",
                            "autoplay": { "delay": 5000 },
                            "slidesPerView": 1,
                            "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }
                        }
                    </script>

                    <div class="swiper-wrapper">
                        {{-- SLIDE 1 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard1.jpg') }}" alt="Blog Hero Image"
                                    class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">LAYANAN PUBLIK</span>
                                    <h1>Ajukan Surat Keterangan Usaha (SKU) dengan Cepat dan Mudah</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">Hari Ini</span>
                                    </div>
                                    <a href="#permohonan" class="read-more">Ajukan Sekarang <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 2 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard2.jpg') }}" alt="Blog Hero Image"
                                    class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">ADMINISTRASI PENDUDUK</span>
                                    <h1>Cek Data Kependudukan dan Kartu Keluarga Anda secara Mandiri</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">Kemarin</span>
                                    </div>
                                    <a href="{{ route('login.form') }}" class="read-more">Masuk Layanan Mandiri <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 3 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard3.jpg') }}" alt="Blog Hero Image"
                                    class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">INFORMASI DESA</span>
                                    <h1>Syarat dan Ketentuan Lengkap Permohonan Surat Domisili</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">2 Hari Lalu</span>
                                    </div>
                                    <a href="#berkas" class="read-more">Cek Persyaratan <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 4 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard4.jpg') }}" alt="Blog Hero Image"
                                    class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">PELAYANAN PUBLIK</span>
                                    <h1>Cara Lacak Status Surat Permohonan Anda Online 24 Jam</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">3 Hari Lalu</span>
                                    </div>
                                    <a href="#status" class="read-more">Lacak Status Surat <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- SLIDE 5 --}}
                        <div class="swiper-slide">
                            <div class="blog-hero-item">
                                <img src="{{ asset('assets-guest/img/dashboard/dashboard5.jpg') }}" alt="Blog Hero Image"
                                    class="img-fluid">
                                <div class="blog-hero-content">
                                    <span class="category">INOVASI DESA</span>
                                    <h1>Pemanfaatan Teknologi Digital untuk Pelayanan Publik yang Lebih Baik</h1>
                                    <div class="meta">
                                        <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                        <span class="date">5 Hari Lalu</span>
                                    </div>
                                    <a href="blog-details.html" class="read-more">Baca Selengkapnya <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </section>

        {{-- BAGIAN QUICK ACCESS LAYANAN (Main Content Widgets) --}}
        <section id="category-section" class="category-section section">

            <div class="container section-title" data-aos="fade-up">
                <span class="description-title">LAYANAN MANDIRI & SURAT</span>
                <h2>Akses Cepat Layanan Administrasi</h2>
                <p>Ajukan surat atau cek status permohonan Anda dengan cepat.</p>
            </div>
            {{-- START ABOUT SECTION --}}
            <section id="about" class="about-section py-5 bg-light text-center">
                <div class="container">
                    <h2 class="fw-bold mb-3">Tentang <span class="text-success">Bina Desa</span></h2>
                    <p class="lead mx-auto" style="max-width: 800px;">
                        <strong>Bina Desa</strong> merupakan platform digital yang dirancang untuk mendukung
                        pengelolaan administrasi dan layanan masyarakat desa secara terpadu, cepat,
                        dan transparan. Melalui sistem ini, pemerintah desa dapat meningkatkan efisiensi
                        pelayanan publik seperti pengajuan surat, manajemen data warga, serta laporan kegiatan
                        pembangunan desa.
                    </p>
                    <p class="text-muted" style="max-width: 750px; margin: 0 auto;">
                        Dengan semangat gotong royong dan inovasi teknologi, Bina Desa hadir
                        untuk mendorong terwujudnya desa yang maju, mandiri, dan berdaya saing
                        di era digital.
                    </p>
                </div>
            </section>
            {{-- END ABOUT SECTION --}}
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 mb-5 justify-content-center">
                    {{-- KOTAK AJUKAN PERMOHONAN SURAT (KONDISIONAL) --}}
                    <div class="col-lg-8">
                        <article class="hero-post p-4 shadow" data-aos="zoom-out" data-aos-delay="200"
                            style="border-radius: 8px; background-color: #f8f9fa;">
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
                                            Mulai pengajuan surat keterangan, domisili, atau surat lainnya dari mana saja
                                            dan kapan saja.
                                        </p>

                                        {{-- TOMBOL PENGAJUAN KONDISIONAL --}}
                                        @if (Auth::check())
                                            <a href="{{ route('permohonan.create') }}" class="btn btn-success mt-2">
                                                Lanjutkan Pengajuan <i class="bi bi-arrow-right"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('login.form') }}" class="btn btn-warning mt-2">
                                                <i class="bi bi-box-arrow-in-right me-1"></i> Login untuk Mengajukan
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    {{-- KOTAK CEK STATUS SURAT --}}
                    <div class="col-lg-4">
                        <div class="sidebar-posts">
                            <article class="sidebar-post p-3 shadow-sm h-100" data-aos="fade-left" data-aos-delay="300"
                                style="border-radius: 8px; background-color: #ffffff;">
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
                        <article class="grid-post p-3 shadow-sm h-100"
                            style="border-radius: 8px; background-color: #ffffff;">
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
                        <article class="grid-post p-3 shadow-sm h-100"
                            style="border-radius: 8px; background-color: #ffffff;">
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

                    {{-- KOTAK LAYANAN MANDIRI (LOGIN KONDISIONAL) --}}
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <article class="grid-post p-3 shadow-sm h-100"
                            style="border-radius: 8px; background-color: #ffffff;">
                            <div class="d-flex align-items-center">
                                <i
                                    class="bi bi-person-lock display-6 {{ Auth::check() ? 'text-success' : 'text-danger' }} me-3"></i>
                                <div>
                                    <h5 class="title mb-1">
                                        @if (Auth::check())
                                            <a href="{{ route('permohonan.index') }}" class="text-success">Data & Riwayat
                                                Saya</a>
                                        @else
                                            <a href="{{ route('login.form') }}" class="text-danger">Layanan Mandiri</a>
                                        @endif
                                    </h5>
                                    <p class="text-muted small mb-0">
                                        @if (Auth::check())
                                            Kelola riwayat permohonan Anda.
                                        @else
                                            Akses data kependudukan pribadi Anda.
                                        @endif
                                    </p>
                                    <a href="{{ Auth::check() ? route('permohonan.index') : route('login.form') }}"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- END MAIN CONTENT --}}
@endsection
