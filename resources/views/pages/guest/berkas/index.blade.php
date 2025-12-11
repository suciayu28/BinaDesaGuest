@extends('layouts.guest.app')

@section('content')
<main class="main">

    {{-- ================= PAGE TITLE ================= --}}
    <div class="page-title">
        <div class="heading">
            <div class="container text-center">
                <h1>Daftar Berkas Persyaratan</h1>
                <p>Kelola berkas persyaratan untuk permohonan surat.</p>
            </div>
        </div>

        {{-- ================= BREADCRUMB ================= --}}
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                    <li class="current">Berkas Persyaratan</li>
                </ol>
            </div>
        </nav>
    </div>

    {{-- ================= MAIN CONTENT ================= --}}
    <section class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            @if($permohonan)
                <div class="mb-4 text-center">
                    <p><strong>Nomor Permohonan:</strong> {{ $permohonan->nomor }}</p>
                    <a href="{{ route('berkas.create', $permohonan->id) }}"
                       class="btn btn-primary">
                        + Tambah Berkas
                    </a>
                </div>
            @endif

            <div class="row g-3">
                @forelse ($berkas as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->nama_berkas }}</h5>

                                <p>
                                    @if($item->valid)
                                        <span class="badge bg-success">Valid</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Valid</span>
                                    @endif
                                </p>

                                @php
                                    // ambil media pertama (karena relasi hasMany)
                                    $media = $item->media->first();
                                @endphp

                                @if($media)
                                    <a href="{{ asset('storage/berkas_persyaratan/' . $media->file_name) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-info mb-2">
                                        Lihat File
                                    </a>
                                @else
                                    <span class="text-muted mb-2 d-block">Tidak ada file</span>
                                @endif

                                <div class="mt-auto">
                                    <a href="{{ route('berkas.edit', $item->berkas_id) }}"
                                       class="btn btn-sm btn-warning me-2">Edit</a>

                                    <form action="{{ route('berkas.destroy', $item->berkas_id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus berkas ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        Belum ada berkas.
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</main>
@endsection
