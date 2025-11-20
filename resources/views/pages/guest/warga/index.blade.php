@extends('layouts.guest.app')

@section('content')
    <main class="main">
        {{-- === PAGE TITLE === --}}
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Daftar Data Warga</h1>
                    <p>Informasi seluruh warga yang terdaftar di sistem.</p>
                </div>
            </div>

            {{-- === BREADCRUMBS === --}}
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="current">Warga</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- === KONTEN UTAMA === --}}
        <section id="warga-content" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        {{-- Tombol Tambah Data Warga --}}
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus me-1"></i> Tambah Data Warga
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
                        {{-- === FILTER & SEARCH === --}}
                        <form method="GET" action="{{ route('warga.index') }}" class="mb-4">
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
                                        <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary w-800 btn-sm">
                                            Clear
                                        </a>
                                    @endif
                                </div>

                                {{-- Dropdown Jenis Kelamin --}}
                                <div class="table-responsive">
                                    <form method="GET" action="{{ route('warga.index') }}"class="mb-3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select name="gender" class="form-select"onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    <option value="Laki-Laki"
                                                        {{ request('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </a>
                            </div>
                    </div>
                    </form>

                    {{-- === CARD LIST ASLI DARI KODEMU === --}}
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @forelse($wargas as $index => $warga)
                                    <div class="col">
                                        <div class="card h-100 shadow warga-card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="me-3 p-2 bg-light rounded-circle"
                                                        style="border: 2px solid var(--primary-color);">
                                                        <i class="fas fa-user-tag fa-lg"
                                                            style="color: var(--primary-color);"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="card-title mb-0 fw-bold text-truncate"
                                                            title="{{ $warga->nama }}">
                                                            {{ $warga->nama }}</h5>
                                                        <p class="text-muted small mb-0">No. Urut:
                                                            {{ $wargas->firstItem() + $index }}</p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="warga-detail-item">
                                                    <i class="fas fa-id-card"></i> <span>No. KTP:
                                                        {{ $warga->no_ktp }}</span>
                                                </div>
                                                <div class="warga-detail-item">
                                                    <i class="fas fa-venus-mars"></i> <span>Jenis Kelamin:
                                                        {{ $warga->jenis_kelamin }}</span>
                                                </div>
                                                <div class="warga-detail-item">
                                                    <i class="fas fa-church"></i> <span>Agama:
                                                        {{ $warga->agama }}</span>
                                                </div>
                                                <div class="warga-detail-item">
                                                    <i class="fas fa-briefcase"></i> <span>Pekerjaan:
                                                        {{ $warga->pekerjaan }}</span>
                                                </div>
                                                <div class="warga-detail-item">
                                                    <i class="fas fa-phone"></i> <span>Telp: {{ $warga->telp }}</span>
                                                </div>
                                                <div class="warga-detail-item">
                                                    <i class="fas fa-envelope"></i> <span>Email:
                                                        {{ $warga->email }}</span>
                                                </div>
                                            </div>

                                            <div class="card-footer card-footer-actions d-flex justify-content-end">
                                                <a href="{{ route('warga.edit', $warga) }}"
                                                    class="btn btn-sm btn-warning me-2" title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="{{ route('warga.destroy', $warga) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Yakin hapus data warga {{ $warga->nama }}?')"
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
                                            <i class="fas fa-info-circle me-1"></i> Belum ada data warga yang tercatat.
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            {{-- pagination --}}
                            <div class="mt-4">
                                {{ $wargas->links('pagination::bootstrap-5') }}
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
