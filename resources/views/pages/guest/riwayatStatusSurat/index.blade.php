@extends('layouts.guest.app')

@section('content')
<main class="main">

    {{-- PAGE TITLE --}}
    <div class="page-title">
        <div class="heading">
            <div class="container text-center">
                <h1>Riwayat Status Surat</h1>
                <p class="mb-0">
                    Detail riwayat proses permohonan surat
                </p>
            </div>
        </div>

        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('permohonan.index') }}">Permohonan Surat</a></li>
                    <li class="current">Riwayat Status</li>
                </ol>
            </div>
        </nav>
    </div>

    {{-- CONTENT --}}
    <section class="section py-4">
        <div class="container">

            @if ($riwayat->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada riwayat status
                </div>
            @else
                <div class="row g-3">

                    @foreach ($riwayat as $item)
                        @php
                            $status = strtolower($item->status);
                            $badge = match ($status) {
                                'diajukan' => 'secondary',
                                'diproses' => 'warning',
                                'selesai'  => 'success',
                                'ditolak'  => 'danger',
                                default    => 'dark',
                            };
                        @endphp

                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">

                                    {{-- HEADER --}}
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-{{ $badge }}">
                                            {{ ucfirst($item->status) }}
                                        </span>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->waktu)->format('d M Y, H:i') }}
                                        </small>
                                    </div>

                                    {{-- INFO --}}
                                    <p class="mb-1">
                                        <strong>Permohonan ID:</strong>
                                        {{ $item->permohonan_id }}
                                    </p>

                                    <p class="mb-1">
                                        <strong>Petugas:</strong>
                                        {{ $item->petugas->nama ?? 'Belum ditentukan' }}
                                    </p>

                                    <p class="mb-0">
                                        <strong>Keterangan:</strong><br>
                                        <span class="text-muted">
                                            {{ $item->keterangan ?? '-' }}
                                        </span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

            {{-- BUTTON --}}
            <div class="mt-4">
                <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i>
                    Kembali ke Permohonan
                </a>
            </div>

        </div>
    </section>

</main>
@endsection
