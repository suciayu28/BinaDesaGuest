@extends('layouts.guest.app')

@section('content')
    <main class="main">

        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Edit Berkas Persyaratan</h1>
                    <p>Perbarui informasi atau file berkas yang telah diunggah.</p>
                </div>
            </div>
        </div>

        <section class="about section">
            <div class="container">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <form action="{{ route('berkas.update', $berkas->berkas_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Berkas</label>
                                <input type="text" name="nama_berkas" value="{{ $berkas->nama_berkas }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File Saat Ini</label><br>

                                @php
                                    // relasi hasMany, jadi ambil file pertama saja
                                    $media = $berkas->media->first();
                                @endphp

                                @if ($media)
                                    <a href="{{ asset('storage/berkas_persyaratan/' . $media->file_name) }}" target="_blank"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Lihat File
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti File (Opsional)</label>
                                <input type="file" name="file" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>
                                Update
                            </button>
                            <a href="{{ route('berkas.index', $berkas->permohonan_id) }}"
                                class="btn btn-secondary">Kembali</a>

                        </form>

                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
