@extends('layouts.guest.app')
@section('content')
    {{--  START MAIN CONTENT --}}
    <main class="main">
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Detail Permohonan Surat</h1>
                    <p>Informasi lengkap mengenai surat dengan Nomor
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

        <section class="section py-4">
            <div class="container" data-aos="fade-up">

                {{-- ALERT STATUS --}}
                @if (strtolower($permohonan->status) == 'ditolak')
                    <div class="alert alert-danger mb-4" role="alert">
                        <h5><i class="bi bi-x-octagon-fill me-2"></i> Permohonan Ditolak</h5>
                        <p class="mb-0">Periksa catatan di bawah untuk alasan penolakan. Ajukan ulang bila diperlukan.</p>
                    </div>
                @elseif (strtolower($permohonan->status) == 'selesai')
                    <div class="alert alert-success mb-4" role="alert">
                        <h5><i class="bi bi-check-circle-fill me-2"></i> Permohonan Selesai</h5>
                        <p class="mb-0">Surat Anda sudah siap. Silakan unduh surat di bawah.</p>
                    </div>
                @endif

                {{-- CARD DETAIL --}}
                <div class="info-card">
                    <h4 class="mb-4"><i class="bi bi-file-earmark-text me-2"></i> Data Permohonan</h4>

                    @php
                        $status = strtolower($permohonan->status);
                        $statusClass = match($status) {
                            'selesai' => 'bg-selesai',
                            'ditolak' => 'bg-ditolak',
                            'diproses' => 'bg-diproses',
                            default => 'bg-menunggu',
                        };
                    @endphp

                    <div class="info-item">
                        <div class="info-label">Nomor Permohonan</div>
                        <div class="info-value">{{ $permohonan->nomor_permohonan ?? '-' }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Nama Warga (NIK)</div>
                        <div class="info-value">
                            {{ $permohonan->warga->nama ?? '-' }} ({{ $permohonan->warga->nik ?? '-' }})
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Jenis Surat</div>
                        <div class="info-value">{{ $permohonan->jenisSurat->nama_jenis ?? '-' }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Tanggal Pengajuan</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($permohonan->tanggal_pengajuan)->format('d F Y H:i') }} WIB</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Tanggal Selesai / Diperbarui</div>
                        <div class="info-value">
                            {{ $permohonan->tanggal_selesai ? \Carbon\Carbon::parse($permohonan->tanggal_selesai)->format('d F Y H:i') . ' WIB' : 'Belum Selesai' }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Status Terkini</div>
                        <div class="info-value">
                            <span class="badge badge-status {{ $statusClass }}">
                                {{ strtoupper($permohonan->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Catatan / Keterangan</div>
                        <div class="info-value">
                            {!! $permohonan->catatan ? nl2br(e($permohonan->catatan)) : '<span class="text-muted">- Tidak ada catatan -</span>' !!}
                        </div>
                    </div>

                    @if ($permohonan->data_surat)
                        <h5 class="mt-5 mb-3">Detail Parameter Surat</h5>
                        <div class="row">
                            @foreach (json_decode($permohonan->data_surat, true) as $key => $value)
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">{{ ucwords(str_replace('_', ' ', $key)) }}</div>
                                        <div class="info-value">{{ $value ?? '-' }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-5 text-end">
                        <a href="{{ route('permohonan.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        @if(strtolower($permohonan->status) == 'selesai')
                            <a href="#" class="btn btn-success">
                                <i class="bi bi-download me-1"></i> Unduh Surat
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- -END MAIN CONTENT --}}
@endsection
