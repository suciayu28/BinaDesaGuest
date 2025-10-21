@extends('layouts.guest')

{{-- Menentukan Title Halaman --}}
@section('title', 'Dashboard - Bina Desa | Layanan Mandiri')

{{-- Anda tidak perlu custom CSS di sini karena sudah ada di Master Layout --}}

@section('content')

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

                    {{-- SLIDE 1: Ajukan SKU --}}
                    <div class="swiper-slide">
                        <div class="blog-hero-item">
                            <img src="{{ asset('storage/img/image_30b0a3.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                            <div class="blog-hero-content">
                                <span class="category">LAYANAN SURAT</span>
                                <h1>Ajukan Surat Keterangan Usaha (SKU) dengan Cepat dan Mudah</h1>
                                <div class="meta">
                                    <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                    <span class="date">Hari Ini</span>
                                </div>
                                <a href="#" class="read-more">Ajukan Sekarang <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- SLIDE 2: Cek Data Kependudukan --}}
                    <div class="swiper-slide">
                        <div class="blog-hero-item">
                            <img src="{{ asset('storage/img/image_30295f.jpg') }}" alt="Blog Hero Image" class="img-fluid">
                            <div class="blog-hero-content">
                                <span class="category">ADMINISTRASI PENDUDUK</span>
                                <h1>Cek Data Kependudukan dan Kartu Keluarga Anda secara Mandiri</h1>
                                <div class="meta">
                                    <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                    <span class="date">Kemarin</span>
                                </div>
                                <a href="#" class="read-more">Login Layanan Mandiri <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- SLIDE 3: Syarat Domisili --}}
                    <div class="swiper-slide">
                        <div class="blog-hero-item">
                            <img src="{{ asset('assets-guest/img/blog/blog-hero-3.webp') }}" alt="Blog Hero Image" class="img-fluid">
                            <div class="blog-hero-content">
                                <span class="category">INFORMASI DESA</span>
                                <h1>Syarat dan Ketentuan Lengkap Permohonan Surat Domisili</h1>
                                <div class="meta">
                                    <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                    <span class="date">2 Hari Lalu</span>
                                </div>
                                <a href="#" class="read-more">Cek Persyaratan <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- SLIDE 4: Lacak Status Surat --}}
                    <div class="swiper-slide">
                        <div class="blog-hero-item">
                            <img src="{{ asset('assets-guest/img/blog/blog-hero-4.webp') }}" alt="Blog Hero Image" class="img-fluid">
                            <div class="blog-hero-content">
                                <span class="category">PELAYANAN PUBLIK</span>
                                <h1>Cara Lacak Status Surat Permohonan Anda Online 24 Jam</h1>
                                <div class="meta">
                                    <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                    <span class="date">3 Hari Lalu</span>
                                </div>
                                <a href="#" class="read-more">Lacak Status Surat <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- SLIDE 5: Inovasi Desa --}}
                    <div class="swiper-slide">
                        <div class="blog-hero-item">
                            <img src="{{ asset('assets-guest/img/blog/blog-hero-5.webp') }}" alt="Blog Hero Image" class="img-fluid">
                            <div class="blog-hero-content">
                                <span class="category">INOVASI DESA</span>
                                <h1>Pemanfaatan Teknologi Digital untuk Pelayanan Publik yang Lebih Baik</h1>
                                <div class="meta">
                                    <span class="author">BY <a href="#">Tim Admin Desa</a></span>
                                    <span class="date">5 Hari Lalu</span>
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

    {{-- BAGIAN AKSES CEPAT LAYANAN --}}
    <section id="category-section" class="category-section section">

        <div class="container section-title" data-aos="fade-up">
            <span class="description-title">LAYANAN MANDIRI & SURAT</span>
            <h2>Akses Cepat Layanan Administrasi</h2>
            <p>Ajukan surat atau cek status permohonan Anda dengan cepat.</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mb-5 justify-content-center">
                <div class="col-lg-8">
                    <article class="hero-post p-4 shadow" data-aos="zoom-out" data-aos-delay="200" style="border-radius: 8px; background-color: #f8f9fa;">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <i class="bi bi-envelope-check display-3 text-primary"></i>
                            </div>
                            <div class="col-md-9">
                                <div class="post-content">
                                    <h2 class="post-title mb-2">
                                        <a href="#">Ajukan Permohonan Surat Online</a>
                                    </h2>
                                    <p class="post-excerpt">
                                        Mulai pengajuan surat keterangan, domisili, atau surat lainnya dari mana saja dan kapan saja.
                                    </p>
                                    <a href="#" class="btn btn-primary mt-2">
                                        Mulai Ajukan Surat <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

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
                                            <a href="#">Cek Status Surat</a>
                                        </h5>
                                        <p class="text-muted small mb-0">Lacak perkembangan surat permohonan Anda.</p>
                                        <a href="#" class="btn btn-sm btn-warning mt-2">
                                            Cek Status <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <article class="grid-post p-3 shadow-sm h-100" style="border-radius: 8px; background-color: #ffffff;">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-file-earmark-text display-6 text-success me-3"></i>
                            <div>
                                <h5 class="title mb-1">
                                    <a href="#">Berkas Persyaratan</a>
                                </h5>
                                <p class="text-muted small mb-0">Lihat dokumen yang diperlukan.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </article>
                </div>

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

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <article class="grid-post p-3 shadow-sm h-100" style="border-radius: 8px; background-color: #ffffff;">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-lock display-6 text-danger me-3"></i>
                            <div>
                                <h5 class="title mb-1">
                                    <a href="#">Layanan Mandiri (Login)</a>
                                </h5>
                                <p class="text-muted small mb-0">Akses data keluarga dan kependudukan.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

        </div>

    </section>

@endsection
