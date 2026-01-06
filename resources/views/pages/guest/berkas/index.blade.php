@extends('layouts.guest.app')

@section('content')
    <main class="main">

        {{-- PAGE TITLE (JANGAN DIUBAH) --}}
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Daftar Berkas Persyaratan</h1>
                    <p>Kelola berkas persyaratan untuk setiap permohonan surat.</p>
                </div>
            </div>

            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li class="current">Berkas Persyaratan</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- CONTENT --}}
        <section class="about section">
            <div class="container" data-aos="fade-up">
                <div class="row g-3">

                    @forelse ($permohonans as $permohonan)
                        @php
                            $badge = match (strtolower($permohonan->status)) {
                                'selesai' => 'success',
                                'diproses' => 'warning',
                                'ditolak' => 'danger',
                                default => 'secondary',
                            };
                        @endphp

                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body p-3">

                                    {{-- HEADER --}}
                                    <div class="fw-semibold mb-1">
                                        {{ $permohonan->jenisSurat->nama_jenis }}
                                    </div>

                                    <span class="badge bg-{{ $badge }} mb-2">
                                        {{ ucfirst($permohonan->status) }}
                                    </span>

                                    <hr class="my-2">

                                    {{-- INFO --}}
                                    <div class="small mb-2">
                                        <div><strong>No:</strong> {{ $permohonan->nomor_permohonan }}</div>
                                        <div><strong>Pemohon:</strong> {{ $permohonan->warga->nama ?? '-' }}</div>
                                    </div>

                                    {{-- BERKAS --}}
                                    <div class="small fw-semibold mb-1">Berkas:</div>
                                    <ul class="list-unstyled small mb-3">
                                        @forelse ($permohonan->berkas as $berkas)
                                            <li class="d-flex justify-content-between align-items-center mb-1">
                                                <span>
                                                    <i class="bi bi-paperclip"></i>
                                                    {{ $berkas->nama_berkas }}
                                                </span>

                                                <div class="d-flex gap-2">
                                                    @php
                                                        $media = $berkas->media->first();
                                                    @endphp

                                                    @if ($media)
                                                        <a href="{{ Storage::url($media->file_name) }}" target="_blank"
                                                            class="btn btn-outline-primary btn-sm">
                                                            Lihat
                                                        </a>
                                                    @endif
                                                    @if (auth()->user()->role !== 'admin')
                                                        <a href="{{ route('berkas.edit', $berkas->berkas_id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('berkas.destroy', $berkas->berkas_id) }}"
                                                            method="POST" onsubmit="return confirm('Hapus berkas ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    @endif

                                                    </form>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="text-muted">Tidak ada berkas</li>
                                        @endforelse
                                    </ul>

                                    {{-- DETAIL --}}
                                    <a href="{{ route('permohonan.show', $permohonan->permohonan_id) }}"
                                        class="btn btn-info btn-sm w-100 text-white">
                                        Detail Permohonan
                                    </a>

                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12 text-center text-muted">
                            Belum ada data berkas persyaratan.
                        </div>
                    @endforelse

                </div>
            </div>
        </section>

    </main>
@endsection
