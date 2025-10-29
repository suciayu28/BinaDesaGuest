@extends('layouts.user.index.app')
@section('content')
{{-- START MAINCONTENT --}}
<div class="content-wrap">
    <div class="container py-5">
        <div class="card-list">
            <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                <i class="fas fa-users me-2"></i> Daftar Pengguna
            </h1>

            <a href="{{ route('users.create') }}" class="btn btn-primary mb-4 shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Tambah User Baru
            </a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- MODIFIKASI DIMULAI DI SINI: MENGGANTI TABEL DENGAN TAMPILAN CARD --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                @forelse($users as $index => $user)
                    {{-- Setiap item di dalam loop akan menjadi kolom (card) --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-start border-4" style="border-color: var(--primary-color) !important;">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    {{-- Menggunakan icon sebagai placeholder avatar --}}
                                    <i class="fas fa-user-circle fa-2x me-3" style="color: var(--primary-color);"></i>
                                    <div>
                                        {{-- Nama Pengguna --}}
                                        <h5 class="card-title mb-0 fw-bold">{{ $user->name }}</h5>
                                        {{-- Nomor Urut di bawah nama --}}
                                        <p class="text-muted small">No. {{ $index + 1 }}</p>
                                    </div>
                                </div>

                                {{-- Email Pengguna --}}
                                <p class="card-text mb-2"><i class="fas fa-envelope me-2 text-muted"></i> {{ $user->email }}</p>

                            </div>
                            <div class="card-footer bg-light d-flex justify-content-end">
                                {{-- Tombol Aksi --}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus user ini?')" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Kondisi jika data kosong, ditampilkan di luar struktur kartu --}}
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada data user.</div>
                    </div>
                @endforelse

            </div>
            {{-- MODIFIKASI BERAKHIR DI SINI --}}
        </div>
    </div>
</div>
{{--END MAINCONTENT --}}
@endsection
