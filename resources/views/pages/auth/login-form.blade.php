@extends('layouts.guest.app')
@section('content')
{{-- START MAIN CONTENT --}}
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 p-4">
                <h3 class="text-center mb-4">Login Layanan Mandiri</h3>

                {{-- ✅ SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {!! session('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- ✅ ERROR MESSAGE --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- ✅ FORM LOGIN --}}
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Warga</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               placeholder="Masukkan email yang terdaftar"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password Anda"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Gunakan password sesuai data Anda di sistem desa.</div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login Sekarang
                        </button>
                    </div>
                </form>

                <p class="text-center text-muted mt-3 small">
                    <a href="{{ route('guest.dashboard') }}" class="text-muted text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </p>

                <p class="text-center text-muted mt-2 small">
                    Belum punya akun? Hubungi admin desa.
                </p>
            </div>
        </div>
    </div>
</div>
{{-- END MAIN CONTENT --}}
@endsection

