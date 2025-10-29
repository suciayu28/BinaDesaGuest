<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Warga | Sistem Informasi Desa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #004680;
            --secondary-color: #f8f9fa;
            --header-bg: var(--primary-color);
            --header-text: #ffffff;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
            --body-bg: #e9ecef;
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

        .card-form {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            padding: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .card-form:hover {
            transform: translateY(-3px);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #004680;
            border-color: #004680;
        }

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
        <div class="card-form">
            <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                <i class="fas fa-user-plus me-2"></i> Tambah Data Warga
            </h1>

            @if(session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p class="fw-bold"><i class="fas fa-exclamation-triangle me-1"></i> Terjadi Kesalahan:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('warga.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. KTP</label>
                        <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email (Digunakan untuk Login)</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-save me-1"></i> Simpan Data</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
            </form>
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
