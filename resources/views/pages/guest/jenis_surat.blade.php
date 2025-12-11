
@extends('layouts.guest.app')
@section('content')
    {{-- ========================== START MAIN CONTENT ========================== --}}
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
        </div>
        {{-- === SECTION DAFTAR JENIS SURAT === --}}
        <section id="jenis-surat-content" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        {{-- Tombol kembali ke Dashboard --}}
                        <div class="d-flex justify-content-end mb-4">
                            <a href="{{ route('guest.dashboard') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
                            </a>
                        </div>
                        

                        <p class="text-center mb-5 lead-intro">
                            Telusuri daftar lengkap surat yang tersedia. Klik <b>Ajukan Permohonan</b> untuk memulai proses pengisian formulir dan syarat administrasi.
                        </p>

                        <div class="row g-4">
                            {{-- LOOPING DATA JENIS SURAT --}}
                            @forelse ($jenisSurats as $surat)
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 150 }}">
                                <article class="card p-4 h-100 jenis-surat-card">
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-start">
                                            {{-- ICON --}}
                                            <i class="bi {{ $surat->icon ?? 'bi-file-earmark-text-fill' }} me-4 flex-shrink-0 card-icon"></i>
                                            <div>
                                                @if ($surat->kode)
                                                    <span class="badge bg-secondary mb-2 rounded-pill">KODE: {{ $surat->kode }}</span>
                                                @endif
                                                <h4 class="card-title mt-1 mb-2">{{ $surat->nama_jenis }}</h4>
                                                <p class="card-text text-muted small mb-4">{{ $surat->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>

                                                <div class="mt-2">
                                                    {{-- Tombol Ajukan Permohonan --}}
                                                    <a href="{{ route('permohonan.create', ['jenis_surat_id' => $surat->jenis_id]) }}" class="btn btn-sm btn-primary me-2 shadow-sm rounded-pill px-3">
                                                        <i class="bi bi-box-arrow-in-right me-1"></i> Ajukan Permohonan
                                                    </a>

                                                    {{-- Tombol Lihat Syarat --}}
                                                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#syaratModal{{ $surat->jenis_id }}">
                                                        <i class="bi bi-card-checklist me-1"></i> Lihat Syarat
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            {{-- Modal Syarat --}}
                            <div class="modal fade" id="syaratModal{{ $surat->jenis_id }}" tabindex="-1" aria-labelledby="syaratModalLabel{{ $surat->jenis_id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Syarat Permohonan: {{ $surat->nama_jenis }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if (isset($surat->syarat_json) && is_array($surat->syarat_json) && count($surat->syarat_json) > 0)
                                                <p class="text-muted">Berikut dokumen dan persyaratan:</p>
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($surat->syarat_json as $syarat)
                                                        <li class="list-group-item">{{ $syarat }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="alert alert-warning">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Belum ada daftar persyaratan untuk surat ini.
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="{{ route('permohonan.create', ['jenis_surat_id' => $surat->jenis_id]) }}" class="btn btn-primary">Ajukan Permohonan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12" data-aos="fade-up">
                                <div class="alert alert-info text-center py-4 rounded-3 shadow-sm">
                                    <i class="bi bi-info-circle-fill me-1"></i> Belum ada jenis surat yang tersedia.
                                </div>
                            </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- ========================== END MAIN CONTENT ========================== --}}
@endsection
