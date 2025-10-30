
@extends('layouts.user.edit.app')
@section('content')
{{-- -START MAINCONTENT --}}
<div class="content-wrap">
    <div class="container">
        <div class="card-form">
            <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                 <i class="fas fa-user-edit me-2"></i> Edit Pengguna
            </h1>
            <h5 class="text-secondary mb-4">Anda sedang mengubah data: {{ $user->name ?? 'User' }}</h5>

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

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Password (kosongkan jika tidak ingin diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-save me-1"></i> Update Data</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
            </form>
            </div>
    </div>
</div>
{{-- END MAINCONTENT --}}
@endsection
