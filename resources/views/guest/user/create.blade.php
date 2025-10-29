@extends('layouts.user.create.app')
@section('content')
{{-- START CONTENT --}}
<div class="content-wrap">
    <div class="container">
        <div class="card-form">
            <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                <i class="fas fa-user-plus me-2"></i> Tambah Pengguna Baru
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

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-save me-1"></i> Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
            </form>
            </div>
    </div>
</div>
@endsection

