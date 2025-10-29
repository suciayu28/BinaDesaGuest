<!DOCTYPE html>
<html lang="en">
{{-- -START CSS --}}
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Permohonan Surat - Bina Desa</title>
    <meta name="description" content="Detail permohonan surat layanan mandiri desa.">
    <meta name="keywords" content="surat desa, detail, permohonan">

    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    <style>
        /* Tambahkan CSS untuk badge status agar konsisten dengan index */
        .badge-status {
            font-size: 0.85em;
            padding: 0.5em 0.8em;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
        }

        /* Definisi warna badge Bootstrap 5 */
        .bg-menunggu { background-color: #ffc107; color: #343a40 !important; } /* Kuning */
        .bg-diproses { background-color: #17a2b8; color: #fff !important; } /* Biru Muda */
        .bg-selesai { background-color: #28a745; color: #fff !important; } /* Hijau */
        .bg-ditolak { background-color: #dc3545; color: #fff !important; } /* Merah */
    </style>
</head>
{{-- END CSS --}}
<body class="about-page">

    {{-- START HEADER --}}
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            {{-- START NAVBAR --}}
            <a href="{{ route('guest.dashboard') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bina Desa</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('guest.dashboard') }}">Layanan Mandiri</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                    <li><a href="{{ route('permohonan.index') }}" class="active">Permohonan Surat</a></li>
                    <li><a href="#">Berkas Persyaratan</a></li>
                    <li><a href="#">Riwayat Status Surat</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
        {{-- END NAVBAR --}}
    </header>
    {{-- END HEADER --}}

    {{--  START MAIN CONTENT --}}
    <main class="main">
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Detail Permohonan Surat</h1>
                    <p>Informasi lengkap mengenai surat dengan Nomor **{{ $permohonan->nomor_permohonan ?? '-' }}**.</p>
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

                {{-- Alert untuk status DITOLAK atau SELESAI --}}
                @if ($permohonan->status == 'ditolak')
                    <div class="alert alert-danger mb-4" role="alert">
                        <h5 class="alert-heading"><i class="bi bi-x-octagon-fill me-2"></i> Permohonan Ditolak</h5>
                        <p class="mb-0">Mohon periksa **Catatan** di bawah untuk mengetahui alasan penolakan. Anda mungkin perlu mengajukan permohonan baru.</p>
                    </div>
                @elseif ($permohonan->status == 'selesai')
                    <div class="alert alert-success mb-4" role="alert">
                        <h5 class="alert-heading"><i class="bi bi-check-circle-fill me-2"></i> Permohonan Selesai</h5>
                        <p class="mb-0">Surat Anda sudah siap. Silakan gunakan tombol **Unduh Surat** di bawah.</p>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Data Permohonan</h4>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th style="width: 30%;">Nomor Permohonan</th>
                                <td>{{ $permohonan->nomor_permohonan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Warga (NIK)</th>
                                <td>{{ $permohonan->warga->nama ?? '-' }} ({{ $permohonan->warga->nik ?? '-' }})</td>
                            </tr>
                            <tr>
                                <th>Jenis Surat</th>
                                <td>{{ $permohonan->jenisSurat->nama_jenis ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>{{ \Carbon\Carbon::parse($permohonan->tanggal_pengajuan)->format('d F Y H:i') }} WIB</td>
                            </tr>
                            <tr>
                                <th>Tanggal Selesai / Diperbarui</th>
                                <td>{{ $permohonan->tanggal_selesai ? \Carbon\Carbon::parse($permohonan->tanggal_selesai)->format('d F Y H:i') . ' WIB' : 'Belum Selesai' }}</td>
                            </tr>
                            <tr>
                                <th>Status Terkini</th>
                                <td>
                                    {{-- Menggunakan operator ternary untuk penentuan kelas badge yang lebih ringkas --}}
                                    @php
                                        $status = strtolower($permohonan->status);
                                        $statusClass = match($status) {
                                            'selesai' => 'bg-selesai',
                                            'ditolak' => 'bg-ditolak',
                                            'diproses' => 'bg-diproses',
                                            default => 'bg-menunggu',
                                        };
                                    @endphp
                                    <span class="badge badge-status {{ $statusClass }}">
                                        {{ strtoupper($permohonan->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Catatan / Keterangan</th>
                                <td>
                                    {!! $permohonan->catatan ? nl2br(e($permohonan->catatan)) : '<span class="text-muted">- Tidak ada catatan -</span>' !!}
                                </td>
                            </tr>
                        </table>

                        {{-- Tampilkan detail parameter surat jika ada --}}
                        @if ($permohonan->data_surat)
                        <h5 class="mt-5 mb-3">Detail Parameter Surat</h5>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Parameter</th>
                                    <th>Isi Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($permohonan->data_surat, true) as $key => $value)
                                <tr>
                                    <td>{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                                    <td>{{ $value ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif


                        <div class="mt-5 text-end">
                            <a href="{{ route('permohonan.index') }}" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                            </a>
                            @if($permohonan->status == 'selesai')
                                {{-- Ganti '#' dengan route download yang sesungguhnya --}}
                                <a href="#" class="btn btn-success">
                                    <i class="bi bi-download me-1"></i> Unduh Surat
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- -END MAIN CONTENT --}}

    {{-- START FOOTER --}}
    <footer id="footer" class="footer position-relative">
        <div class="container text-center py-3">
            <p>© 2025 Bina Desa. All Rights Reserved</p>
        </div>
    </footer>
{{-- END FOOTER --}}

{{-- START JS --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
    {{-- END JS --}}
</body>
</html>
