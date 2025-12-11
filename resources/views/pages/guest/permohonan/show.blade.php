@extends('layouts.guest.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <main class="main">

        {{-- ========================== PAGE TITLE ============================= --}}
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

        {{-- ========================== DETAIL SECTION ============================= --}}
        <section class="section py-4">
            <div class="container" data-aos="fade-up">

                {{-- ========================== ALERT STATUS ============================= --}}
                @if (strtolower($permohonan->status) == 'ditolak')
                    <div class="alert alert-danger mb-4">
                        <h5><i class="bi bi-x-octagon-fill me-2"></i> Permohonan Ditolak</h5>
                        <p class="mb-0">Periksa alasan penolakan pada catatan di bawah.</p>
                    </div>
                @elseif (strtolower($permohonan->status) == 'selesai')
                    <div class="alert alert-success mb-4">
                        <h5><i class="bi bi-check-circle-fill me-2"></i> Permohonan Selesai</h5>
                        <p class="mb-0">Surat telah selesai diproses. Anda dapat mengunduhnya.</p>
                    </div>
                @endif

                {{-- ========================== CARD DETAIL ============================= --}}
                <div class="info-card p-4 shadow-sm rounded-4 bg-white border">

                    <h4 class="mb-4 pb-2 border-bottom">
                        <i class="bi bi-file-earmark-text me-2"></i> Data Permohonan
                    </h4>

                    @php
                        $status = strtolower($permohonan->status);
                        $statusClass = match ($status) {
                            'selesai' => 'bg-success text-white',
                            'ditolak' => 'bg-danger text-white',
                            'diproses' => 'bg-warning text-dark',
                            default => 'bg-secondary text-white',
                        };
                    @endphp

                    {{-- ========================== DETAIL ITEMS ============================= --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Status Terkini</div>
                                <span class="badge rounded-pill px-3 py-2 {{ $statusClass }}">
                                    {{ strtoupper($permohonan->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Nama Warga (NIK)</div>
                                <div class="info-value fw-bold">
                                    {{ $permohonan->warga->nama ?? '-' }} ({{ $permohonan->warga->nik ?? '-' }})
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Jenis Surat</div>
                                <div class="info-value fw-bold">
                                    {{ $permohonan->jenisSurat->nama_jenis ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Tanggal Pengajuan</div>
                                <div class="info-value">
                                    {{ $permohonan->tanggal_pengajuan->format('d F Y H:i') }} WIB
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="info-item border-bottom pb-2">
                                <div class="info-label text-muted small">Tanggal Selesai / Update</div>
                                <div class="info-value">
                                    {{ $permohonan->tanggal_selesai
                                        ? \Carbon\Carbon::parse($permohonan->tanggal_selesai)->format('d F Y H:i') . ' WIB'
                                        : 'Belum Selesai' }}
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

                    {{-- ========================== DATA SURAT DETAIL ============================= --}}
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

                    {{-- ========================== BERKAS SYARAT ============================= --}}
                    @if ($permohonan->berkas->count() > 0)
                        <h5 class="mt-5 mb-3 pb-2 border-bottom">
                            <i class="bi bi-folder2-open me-1"></i> Daftar Berkas Persyaratan
                        </h5>

                        <ul>
                            @foreach ($permohonan->berkas as $item)
                                <li>
                                    {{ $item->nama_berkas }}

                                    @php $file = $item->media->first(); @endphp

                                    @if ($file)
                                        - <a href="{{ Storage::url($file->file_name) }}" target="_blank">
                                            Lihat
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- ========================== LAMPIRAN PERMOHONAN ============================= --}}
                    <h5 class="mt-5 mb-3 pb-2 border-bottom">
                        <i class="bi bi-paperclip me-2"></i> Lampiran Permohonan
                    </h5>

                    @if (!$permohonan->media || $permohonan->media->count() == 0)
                        <div class="alert alert-warning">Belum ada lampiran yang diunggah.</div>
                    @else
                        <div class="row g-3 mb-4">
                            @foreach ($permohonan->media as $m)
                                <div class="col-md-4">
                                    <div class="p-2 border rounded bg-light h-100">

                                        {{-- Preview --}}
                                        @if (Str::startsWith($m->mime_type, 'image'))
                                            <img src="{{ Storage::url($m->file_name) }}" class="img-fluid rounded mb-2"
                                                style="max-height:150px;object-fit:contain;">
                                        @else
                                            <div class="text-center text-muted mb-2">
                                                <i class="bi bi-file-earmark fs-1"></i>
                                            </div>
                                        @endif

                                        <div class="small text-truncate mb-2">
                                            {{ basename($m->file_name) }}
                                        </div>

                                        <a href="{{ Storage::url($m->file_name) }}" target="_blank"
                                            class="btn btn-sm btn-primary w-100 mb-2">
                                            <i class="bi bi-eye"></i> Lihat / Unduh
                                        </a>

                                        <form action="{{ route('uploads.destroy', $m->media_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger w-100"
                                                onclick="return confirm('Hapus lampiran ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- ========================== UPLOAD LAMPIRAN BARU ============================= --}}
                    <div class="border rounded p-3 bg-light shadow-sm mt-4">
                        <h6 class="mb-3">
                            <i class="bi bi-upload me-2"></i> Upload Lampiran Baru (Multi File)
                        </h6>

                        <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->permohonan_id }}">

                            <div class="mb-3">
                                <input type="file" name="files[]" class="form-control" multiple required>
                                <small class="text-muted">Anda dapat memilih lebih dari satu file.</small>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-cloud-upload"></i> Upload
                            </button>
                        </form>
                    </div>

                </div>

                {{-- ========================== BUTTON AREA ============================= --}}
                <div class="mt-4 pt-3 border-top d-flex justify-content-between">

                    @auth
                        @if (strtolower($permohonan->status) == 'diajukan')
                            <form action="{{ route('permohonan.approve', $permohonan->permohonan_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Setujui permohonan ini?')">
                                    <i class="bi bi-check-circle me-1"></i> Setujui Permohonan
                                </button>
                            </form>
                        @endif
                    @endauth

                    <div>
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
@endsection
