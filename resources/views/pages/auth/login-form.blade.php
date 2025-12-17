@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
<div class="card border-0 shadow-lg rounded-4 p-4 p-lg-5">

    {{-- Header --}}
    <div class="text-center mb-4">
        <h1 class="h4 fw-bold mb-1">Login</h1>
        <p class="text-muted small">Silakan masuk untuk melanjutkan</p>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success small">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger small">
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
            <label class="form-label fw-semibold">Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="example@email.com"
                   value="{{ old('email') }}"
                   required
                   autofocus>
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>
        </div>

        {{-- Remember --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label small" for="remember">
                    Ingat saya
                </label>
            </div>
            <a href="#" class="small text-decoration-none">Lupa password?</a>
        </div>

        {{-- Button --}}
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                Login
            </button>
        </div>
    </form>

    {{-- Footer --}}
    <div class="text-center mt-4 small text-muted">
        © {{ date('Y') }} Sistem Layanan Surat
    </div>

</div>
@endsection
