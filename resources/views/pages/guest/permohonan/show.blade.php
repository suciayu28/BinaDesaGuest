@extends('layouts.guest.app')

@section('content')
    {{-- START MAIN CONTENT --}}
    <main class="main">

        {{-- PAGE TITLE --}}
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Detail Permohonan Surat</h1>
                    <p>
                        Informasi lengkap mengenai surat dengan Nomor
                        <strong>{{ $permohonan->nomor_permohonan ?? '-' }}</strong>.
                    </p>
                </div>
            </div>

            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('permohonan.index') }}">Permohonan Surat</a></li>
                        <li class="current">Detail</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- SECTION DETAIL --}}
        <section class="section py-4">
            <div class="container" data-aos="fade-up">

                {{-- ALERT STATUS --}}
                @if (strtolower($permohonan->status) == 'ditolak')
                    <div class="alert alert-danger mb-4" role="alert">
                        <h5><i class="bi bi-x-octagon-fill me-2"></i> Permohonan Ditolak</h5>
                        <p class="mb-0">
                            Periksa catatan di bawah untuk alasan penolakan. Ajukan ulang bila diperlukan.
                        </p>
                    </div>
                @elseif (strtolower($permohonan->status) == 'selesai')
                    <div class="alert alert-success mb-4" role="alert">
                        <h5><i class="bi bi-check-circle-fill me-2"></i> Permohonan Selesai</h5>
                        <p class="mb-0">
                            Surat Anda sudah siap. Silakan unduh surat di bawah.
                        </p>
                    </div>
                @endif

                {{-- CARD DETAIL --}}
                <div class="info-card p-4 shadow-sm rounded-4 bg-white border">
                    <h4 class="mb-4 pb-2 border-bottom">
                        <i class="bi bi-file-earmark-text me-2"></i> Data Permohonan
                    </h4>

                    @php
                        $status = strtolower($permohonan->status);
                        $statusClass = match($status) {
                            'selesai' => 'bg-success text-white', // Simplified badge classes
                            'ditolak' => 'bg-danger text-white',
                            'diproses' => 'bg-warning text-dark',
                            default => 'bg-secondary text-white',
                        };
                    @endphp

                    {{-- DETAIL ITEMS: Using grid/row for better alignment --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Nomor Permohonan</div>
                                <div class="info-value fw-bold">{{ $permohonan->nomor_permohonan ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Nama Warga (NIK)</div>
                                <div class="info-value">
                                    <span class="fw-bold">{{ $permohonan->warga->nama ?? '-' }}</span> ({{ $permohonan->warga->nik ?? '-' }})
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Jenis Surat</div>
                                <div class="info-value fw-bold">{{ $permohonan->jenisSurat->nama_jenis ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Tanggal Pengajuan</div>
                                <div class="info-value">
                                    {{ \Carbon\Carbon::parse($permohonan->tanggal_pengajuan)->format('d F Y H:i') }} WIB
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Tanggal Selesai / Diperbarui</div>
                                <div class="info-value">
                                    {{ $permohonan->tanggal_selesai
                                        ? \Carbon\Carbon::parse($permohonan->tanggal_selesai)->format('d F Y H:i') . ' WIB'
                                        : 'Belum Selesai' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Status Terkini</div>
                                <div class="info-value">
                                    <span class="badge rounded-pill px-3 py-2 {{ $statusClass }}">
                                        {{ strtoupper($permohonan->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="info-item pt-2">
                                <div class="info-label text-muted small">Catatan / Keterangan</div>
                                <div class="info-value border rounded p-2 bg-light">
                                    {!! $permohonan->catatan
                                        ? nl2br(e($permohonan->catatan))
                                        : '<span class="text-muted">- Tidak ada catatan -</span>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END DETAIL ITEMS --}}

                    {{-- DETAIL DATA SURAT --}}
                    @if ($permohonan->data_surat)
                        <h5 class="mt-5 mb-3 pb-2 border-bottom">
                            <i class="bi bi-list-columns-reverse me-1"></i> Detail Parameter Surat
                        </h5>
                        <div class="row">
                            @foreach (json_decode($permohonan->data_surat, true) as $key => $value)
                                <div class="col-md-6 mb-3">
                                    <div class="info-item border rounded p-2 bg-light h-100">
                                        <div class="info-label text-muted small">
                                            {{ ucwords(str_replace('_', ' ', $key)) }}
                                        </div>
                                        <div class="info-value fw-bold">{{ $value ?? '-' }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- BUTTON AREA --}}
                    <div class="mt-5 pt-3 border-top text-end">
                        <a href="{{ route('permohonan.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>

                        @if (strtolower($permohonan->status) == 'selesai')
                            <a href="#" class="btn btn-success">
                                <i class="bi bi-download me-1"></i> Unduh Surat
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- END MAIN CONTENT --}}
@endsection
