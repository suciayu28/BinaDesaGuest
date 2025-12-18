@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
    <div class="card border-0 shadow-lg rounded-4 p-4 p-lg-5"
         style="
            background: linear-gradient(145deg, #ffffff, #eef4ff);
            animation: fadeUp .6s ease;
         ">

        {{-- LOGO --}}
        <div class="text-center mb-3">
            <img src="{{ asset('assets-guest/img/logo/logo.png') }}"
                 alt="Logo Bina Desa"
                 style="
                    height: 150px;
                    width: auto;
                    filter: drop-shadow(0 10px 20px rgba(13,110,253,.35));
                 ">
        </div>

        {{-- Header --}}
        <div class="text-center mb-4">
            <h1 class="h4 fw-bold mb-1 text-primary">Selamat Datang</h1>
            <p class="text-muted small mb-2">
                Portal Layanan Surat Desa
            </p>
            <span style="
                display:inline-block;
                width:70px;
                height:4px;
                background:#0d6efd;
                border-radius:10px;
            "></span>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success small rounded-3 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger small rounded-3 shadow-sm">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Email</label>
                <input type="email"
                       name="email"
                       class="form-control rounded-3 shadow-sm"
                       placeholder="example@email.com"
                       value="{{ old('email') }}"
                       required autofocus
                       style="padding: 12px;">
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Password</label>
                <input type="password"
                       name="password"
                       class="form-control rounded-3 shadow-sm"
                       placeholder="Masukkan password"
                       required
                       style="padding: 12px;">
            </div>

            {{-- Remember --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">
                        Ingat saya
                    </label>
                </div>
                <a href="#" class="small text-decoration-none fw-semibold text-primary">
                    Lupa password?
                </a>
            </div>

            {{-- Button --}}
            <div class="d-grid">
                <button type="submit"
                        class="btn btn-primary btn-lg rounded-3 shadow"
                        style="
                            transition: .3s;
                        ">
                    Masuk ke Sistem
                </button>
            </div>
        </form>

        {{-- Footer --}}
        <div class="text-center mt-4 small text-muted">
            © {{ date('Y') }} Sistem Layanan Surat
        </div>

        {{-- ANIMATION --}}
        <style>
            @keyframes fadeUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

    </div>
@endsection
