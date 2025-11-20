@extends('layouts.guest.app')

@section('content')
    <main class="main">
        {{-- === PAGE TITLE === --}}
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Daftar Data Pengguna</h1>
                    <p>Informasi seluruh pengguna yang terdaftar di sistem.</p>
                </div>
            </div>

            {{-- === BREADCRUMBS === --}}
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="current">Pengguna</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- === KONTEN UTAMA === --}}
        <section id="user-content" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        {{-- Tombol Tambah & Kembali --}}
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus me-1"></i> Tambah Data Pengguna
                            </a>
                            <a href="{{ route('guest.dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
                            </a>
                        </div>

                        {{-- Flash Message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle me-1"></i> {{ session('error') }}
                            </div>
                        @endif
                        {{-- === FILTER & SEARCH USER === --}}
                        <form method="GET" action="{{ route('users.index') }}" class="mb-4">
                            <div class="row g-3 align-items-center">

                                {{-- Search Input --}}
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            value="{{ request('search') }}" placeholder="Search">

                                        <button type="submit" class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                {{-- Clear Button --}}
                                <div class="col-md-2">
                                    @if (request('search'))
                                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary w-800 btn-sm">
                                            Clear
                                        </a>
                                    @endif
                                </div>

                        </form>

                        {{-- === CARD LIST (Tampilan Sama dengan Warga Index) === --}}
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                    @forelse($users as $index => $user)
                                        <div class="col">
                                            <div class="card h-100 shadow user-card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="me-3 p-2 bg-light rounded-circle"
                                                            style="border: 2px solid var(--primary-color);">
                                                            <i class="fas fa-user fa-lg"
                                                                style="color: var(--primary-color);"></i>
                                                        </div>
                                                        <div>
                                                            <h5 class="card-title mb-0 fw-bold text-truncate"
                                                                title="{{ $user->name }}">
                                                                {{ $user->name }}
                                                            </h5>
                                                            <p class="text-muted small mb-0">User ID: {{ $user->id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="user-detail-item">
                                                        <i class="fas fa-envelope"></i>
                                                        <span>Email: {{ $user->email }}</span>
                                                    </div>

                                                    @if (!empty($user->role))
                                                        <div class="user-detail-item">
                                                            <i class="fas fa-user-shield"></i>
                                                            <span>Role: {{ ucfirst($user->role) }}</span>
                                                        </div>
                                                    @endif

                                                    @if (!empty($user->phone))
                                                        <div class="user-detail-item">
                                                            <i class="fas fa-phone"></i>
                                                            <span>Telp: {{ $user->phone }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="card-footer card-footer-actions d-flex justify-content-end">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-sm btn-warning me-2" title="Edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Yakin hapus pengguna {{ $user->name }}?')"
                                                            class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="alert alert-info text-center mt-3">
                                                <i class="fas fa-info-circle me-1"></i> Belum ada pengguna yang terdaftar.
                                            </div>
                                        </div>
                                    @endforelse
                                    <div class="mt-4">
                                        {{ $users->links('pagination::bootstrap-5') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- === END CARD LIST === --}}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
