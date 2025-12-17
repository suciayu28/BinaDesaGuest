@extends('layouts.guest.app')
@section('content')
    <main class="main">

        {{-- === PAGE TITLE === --}}
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Edit Data Pengguna</h1>
                    <p>Perbarui informasi pengguna: <strong>{{ $user->name ?? 'User' }}</strong></p>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('users.index') }}">Data Pengguna</a></li>
                        <li class="current">Edit Pengguna</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- === MAIN SECTION === --}}
        <section id="edit-user" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h4 class="mb-4 text-start" style="color: var(--primary-color);">
                                    <i class="fas fa-user-edit me-2"></i> Edit Data Pengguna: {{ $user->name ?? 'User' }}
                                </h4>

                                {{-- Alert sukses --}}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                                    </div>
                                @endif

                                {{-- Alert error --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <p class="fw-bold">
                                            <i class="fas fa-exclamation-triangle me-1"></i> Terjadi Kesalahan:
                                        </p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- === FORM UPDATE USER === --}}
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $user->name) }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email (Digunakan untuk Login)</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="">-- Pilih Role --</option>

                                                <option value="admin"
                                                    {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>

                                                <option value="pelanggan"
                                                    {{ old('role', $user->role) == 'pelanggan' ? 'selected' : '' }}>
                                                    Pelanggan
                                                </option>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="alert alert-info" role="alert">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Kosongkan kolom password di bawah jika Anda <b>TIDAK</b> ingin mengubah password.
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Password Baru</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Kosongkan jika tidak ingin ganti">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Konfirmasi Password Baru</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Kosongkan jika tidak ingin ganti">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary shadow-sm">
                                            <i class="fas fa-sync-alt me-1"></i> Perbarui Data
                                        </button>
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left me-1"></i> Kembali
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
