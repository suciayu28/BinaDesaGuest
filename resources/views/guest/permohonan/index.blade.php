
@extends('layouts.permohonan.index.app')
@section('content')
    <main class="main">
{{-- -START MAIN CONTENT --}}
        {{-- === PAGE TITLE / BREADCRUMBS === --}}
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Riwayat Permohonan Surat</h1>
                            <p class="mb-0">Daftar semua permohonan surat yang telah Anda ajukan beserta status terkininya.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="current">Permohonan Surat</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- === KONTEN UTAMA: DAFTAR PERMOHONAN === --}}
        <section id="permohonan-content" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        {{-- TOMBOL BARU/KEMBALI --}}
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('jenis-surat.index') }}" class="btn btn-primary">
                                <i class="bi bi-file-earmark-plus-fill me-1"></i> Ajukan Permohonan Baru
                            </a>
                            <a href="{{ route('guest.dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
                            </a>
                        </div>

                        {{-- TAMPILKAN FLASH MESSAGES --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! session('success') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {!! session('error') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-4">Daftar Pengajuan Surat Anda ({{ $permohonans->count() }} Total)</h4>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No. Permohonan</th>
                                                <th scope="col">Jenis Surat</th>
                                                <th scope="col">Tgl. Pengajuan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- LOOPING DATA RIWAYAT PERMOHONAN --}}
                                            @forelse ($permohonans as $index => $permohonan)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                {{-- Jika nomor_permohonan adalah kolom wajib, pastikan ia terisi di Controller/Model --}}
                                                <td><strong>{{ $permohonan->nomor_permohonan ?? 'Belum ada No.' }}</strong></td>
                                                {{-- Menggunakan operator null coalescing untuk keamanan --}}
                                                <td>{{ $permohonan->jenisSurat->nama_jenis ?? 'Jenis Tidak Dikenal' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($permohonan->tanggal_pengajuan)->translatedFormat('d F Y') }}</td>
                                                <td>
                                                    @php
                                                         // Logika untuk menentukan kelas CSS berdasarkan status
                                                         // Status di database diasumsikan lower case: 'menunggu', 'diproses', 'selesai', 'ditolak', 'diajukan'
                                                         $statusLower = strtolower($permohonan->status ?? 'menunggu'); // Default 'menunggu' jika status null
                                                         $statusClass = match($statusLower) {
                                                             'selesai' => 'status-selesai',
                                                             'ditolak' => 'status-ditolak',
                                                             'diproses' => 'status-diproses',
                                                             default => 'status-menunggu',
                                                         };
                                                         $statusDisplay = ucwords($permohonan->status ?? 'Menunggu');
                                                     @endphp
                                                    <span class="status-badge {{ $statusClass }}">
                                                        {{ $statusDisplay }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- Link Aksi: Detail Permohonan --}}
                                                    {{-- Pastikan route 'permohonan.show' sudah didefinisikan --}}
                                                    <a href="{{ route('permohonan.show', $permohonan->permohonan_id) }}" class="btn btn-sm btn-info text-white me-1" title="Lihat Detail">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    {{-- Tombol Download hanya jika status selesai --}}
                                                    @if($statusLower == 'selesai')
                                                        {{-- GANTI '#' dengan route download yang benar: route('permohonan.download', $permohonan->permohonan_id) --}}
                                                        <a href="#" class="btn btn-sm btn-success" title="Unduh Surat">
                                                            <i class="bi bi-cloud-arrow-down"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            {{-- JIKA DATA KOSONG --}}
                                            <tr>
                                                <td colspan="6" class="text-center py-5">
                                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                                    <p class="lead-intro">Anda belum memiliki riwayat pengajuan surat.</p>
                                                    <a href="{{ route('jenis-surat.index') }}" class="btn btn-outline-primary mt-2">
                                                        Mulai Ajukan Surat Pertama Anda
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Jika Anda menggunakan pagination, tambahkan di sini: --}}
                                {{-- <div class="mt-3">
                                     {{ $permohonans->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
{{-- -END MAIN CONTENT --}}
@endsection

