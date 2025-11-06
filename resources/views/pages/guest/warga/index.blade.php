@extends('layouts.guest.app')
@section('content')
    <div class="content-wrap">
        <div class="container">
            <div class="card-list">
                <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                    <i class="fas fa-address-card me-2"></i> Daftar Data Warga
                </h1>

                <a href="{{ route('warga.create') }}" class="btn btn-primary mb-4 shadow-sm">
                    <i class="fas fa-user-plus me-1"></i> Tambah Data Warga
                </a>

                @if (session('success'))
                    <div class="alert alert-success"><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</div>
                @endif

                {{-- START CARD LAYOUT --}}
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse($wargas as $index => $warga)
                        <div class="col">
                            <div class="card h-100 shadow warga-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        {{-- Icon/Header Card --}}
                                        <div class="me-3 p-2 bg-light rounded-circle"
                                            style="border: 2px solid var(--primary-color);">
                                            <i class="fas fa-user-tag fa-lg" style="color: var(--primary-color);"></i>
                                        </div>
                                        <div>
                                            {{-- Nama Warga --}}
                                            <h5 class="card-title mb-0 fw-bold text-truncate" title="{{ $warga->nama }}">
                                                {{ $warga->nama }}</h5>
                                            {{-- Nomor Urut Pagination --}}
                                            <p class="text-muted small mb-0">No. Urut: {{ $wargas->firstItem() + $index }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>

                                    {{-- Detail Informasi --}}
                                    <div class="warga-detail-item">
                                        <i class="fas fa-id-card"></i> <span>No. KTP: {{ $warga->no_ktp }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-venus-mars"></i> <span>Jenis Kelamin:
                                            {{ $warga->jenis_kelamin }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-church"></i> <span>Agama: {{ $warga->agama }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-briefcase"></i> <span>Pekerjaan: {{ $warga->pekerjaan }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-phone"></i> <span>Telp: {{ $warga->telp }}</span>
                                    </div>
                                    <div class="warga-detail-item">
                                        <i class="fas fa-envelope"></i> <span>Email: {{ $warga->email }}</span>
                                    </div>
                                </div>

                                {{-- Aksi Button --}}
                                <div class="card-footer card-footer-actions d-flex justify-content-end">

                                    {{-- PERBAIKAN: Meneruskan objek $warga ke route helper --}}
                                    <a href="{{ route('warga.edit', $warga) }}" class="btn btn-sm btn-warning me-2"
                                        title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- PERBAIKAN: Meneruskan objek $warga ke route helper --}}
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

                <div class="mt-4">
                    {{ $wargas->links('pagination::bootstrap-5') }}
                </div>
                {{-- END CARD LAYOUT --}}
            </div>
        </div>
    </div>
@endsection
