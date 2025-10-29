<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga | Sistem Informasi Desa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #004680;
            /* Biru Tua/Desa */
            --secondary-color: #f8f9fa;
            --header-bg: var(--primary-color);
            --header-text: #ffffff;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
            --body-bg: #e9ecef;
            --success-color: #28a745;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--body-bg);
        }

        .content-wrap {
            flex: 1;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        /* HEADER Styling */
        .main-header {
            background-color: var(--header-bg);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .main-header .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--header-text) !important;
        }

        /* CARD/TABLE Styling */
        .card-list {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .card-list:hover {
            /* Efek hover pada container utama dihilangkan agar fokus ke card individu */
            transform: none;
        }

        /* CARD WARGA Styling */
        .warga-card {
            border-left: 6px solid var(--primary-color);
            transition: all 0.2s ease-in-out;
            border-radius: 0.5rem;
        }

        .warga-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15) !important;
        }

        .warga-detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .warga-detail-item i {
            width: 1.5rem;
            text-align: center;
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        /* Aksi */
        .card-footer-actions {
            background-color: var(--secondary-color) !important;
            border-top: 1px solid #dee2e6;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* FOOTER Styling */
        .main-footer {
            padding: 20px 0;
            background-color: var(--footer-bg);
            color: var(--footer-text);
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-lg p-3">
            <div class="container">
                <a class="navbar-brand" href="#">SISTEM INFORMASI BINA DESA</a>
            </div>
        </nav>
    </header>

    <div class="content-wrap">
        <div class="container">
            <div class="card-list">
                <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                    <i class="fas fa-address-card me-2"></i> Daftar Data Warga
                </h1>

                <a href="{{ route('warga.create') }}" class="btn btn-primary mb-4 shadow-sm">
                    <i class="fas fa-user-plus me-1"></i> Tambah Data Warga
                </a>

                @if (session('success'))
                    <div class="alert alert-success"><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</div>
                @endif

                {{-- START CARD LAYOUT --}}
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse($wargas as $index => $warga)
                        <div class="col">
                            <div class="card h-100 shadow warga-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        {{-- Icon/Header Card --}}
                                        <div class="me-3 p-2 bg-light rounded-circle" style="border: 2px solid var(--primary-color);">
                                            <i class="fas fa-user-tag fa-lg" style="color: var(--primary-color);"></i>
                                        </div>
                                        <div>
                                            {{-- Nama Warga --}}
                                            <h5 class="card-title mb-0 fw-bold text-truncate" title="{{ $warga->nama }}">{{ $warga->nama }}</h5>
                                            {{-- Nomor Urut Pagination --}}
                                            <p class="text-muted small mb-0">No. Urut: {{ $wargas->firstItem() + $index }}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    {{-- Detail Informasi --}}
                                    <div class="warga-detail-item">
                                        <i class="fas fa-id-card"></i> <span>No. KTP: {{ $warga->no_ktp }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-venus-mars"></i> <span>Jenis Kelamin: {{ $warga->jenis_kelamin }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-church"></i> <span>Agama: {{ $warga->agama }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-briefcase"></i> <span>Pekerjaan: {{ $warga->pekerjaan }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-phone"></i> <span>Telp: {{ $warga->telp }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-envelope"></i> <span>Email: {{ $warga->email }}</span>
                                    </div>
                                </div>

                               {{-- Aksi Button --}}
                                <div class="card-footer card-footer-actions d-flex justify-content-end">

                                    {{-- PERBAIKAN: Meneruskan objek $warga ke route helper --}}
                                    <a href="{{ route('warga.edit', $warga) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- PERBAIKAN: Meneruskan objek $warga ke route helper --}}
                                    <form action="{{ route('warga.destroy', $warga) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus data warga {{ $warga->nama }}?')" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center mt-3">
                                <i class="fas fa-info-circle me-1"></i> Belum ada data warga yang tercatat.
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $wargas->links('pagination::bootstrap-5') }}
                </div>
                {{-- END CARD LAYOUT --}}
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <p class="mb-0">Hak Cipta &copy; 2025 - Sistem Informasi Bina Desa. Dikelola oleh Tim IT Desa.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
