@extends('layouts.guest.app')

@section('content')
<main class="main">

    <div class="page-title">
        <div class="heading">
            <div class="container text-center">
                <h1>Tambah Berkas Persyaratan</h1>
                <p>Unggah berkas untuk permohonan Anda.</p>
            </div>
        </div>
    </div>

    <section class="about section">
        <div class="container">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Gagal!</strong> Harap periksa kesalahan berikut:
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{ route('berkas.store', $permohonan->permohonan_id) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf

                        {{-- NAMA BERKAS --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Berkas <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_berkas"
                                   class="form-control @error('nama_berkas') is-invalid @enderror"
                                   value="{{ old('nama_berkas') }}"
                                   required>

                            @error('nama_berkas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- FILE --}}
                        <div class="mb-3">
                            <label class="form-label">Upload File <span class="text-danger">*</span></label>

                            <input type="file"
                                   name="file"
                                   class="form-control @error('file') is-invalid @enderror"
                                   required>

                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- BUTTON --}}
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>

                        <a href="{{ route('berkas.index', $permohonan->permohonan_id) }}"
                           class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</main>
@endsection
