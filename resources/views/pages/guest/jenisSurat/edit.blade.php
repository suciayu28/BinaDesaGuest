@extends('layouts.guest.app')

@section('content')
    <main class="main">

        {{-- PAGE TITLE --}}
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Edit Jenis Surat</h1>
                            <p class="mb-0">Perbarui data jenis surat berikut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                        <li class="current">Edit</li>
                    </ol>
                </div>
            </nav>
        </div>

        {{-- CONTENT --}}
        <section class="section">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card shadow-sm rounded-3">
                            <div class="card-body">

                                {{-- ALERT ERROR --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- ✅ PK kamu jenis_id, jadi pakai ini --}}
                                <form action="{{ route('jenis-surat.update', $jenisSurat->jenis_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    {{-- NAMA JENIS --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Nama Jenis Surat <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nama_jenis" class="form-control"
                                            value="{{ old('nama_jenis', $jenisSurat->nama_jenis) }}" required>
                                    </div>

                                    {{-- KODE --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kode Surat</label>
                                        <input type="text" name="kode" class="form-control"
                                            value="{{ old('kode', $jenisSurat->kode) }}" placeholder="Contoh: SKTM">
                                    </div>

                                    {{-- DESKRIPSI --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Deskripsi</label>
                                        <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $jenisSurat->deskripsi) }}</textarea>
                                    </div>


                                    {{-- SYARAT --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Syarat Permohonan</label>

                                        <div id="syarat-wrapper">
                                            @php
                                                $syaratList = old('syarat_json', $jenisSurat->syarat_json ?? []);
                                                if (!is_array($syaratList)) {
                                                    $syaratList = [];
                                                }
                                            @endphp

                                            @if (count($syaratList) > 0)
                                                @foreach ($syaratList as $syarat)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="syarat_json[]" class="form-control"
                                                            value="{{ $syarat }}" placeholder="Contoh: Fotokopi KTP">
                                                        <button type="button" class="btn btn-outline-danger remove-syarat">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="input-group mb-2">
                                                    <input type="text" name="syarat_json[]" class="form-control"
                                                        placeholder="Contoh: Fotokopi KTP">
                                                    <button type="button" class="btn btn-outline-danger remove-syarat">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>

                                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="add-syarat">
                                            <i class="bi bi-plus-circle me-1"></i> Tambah Syarat
                                        </button>
                                    </div>

                                    {{-- BUTTON --}}
                                    <div class="d-flex justify-content-end gap-2 mt-4">
                                        <a href="{{ route('jenis-surat.index') }}" class="btn btn-secondary">
                                            Batal
                                        </a>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bi bi-save me-1"></i> Update
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- SCRIPT --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const addBtn = document.getElementById('add-syarat');
                const wrapper = document.getElementById('syarat-wrapper');
                if (!addBtn || !wrapper) return;

                addBtn.addEventListener('click', function() {
                    const div = document.createElement('div');
                    div.className = 'input-group mb-2';
                    div.innerHTML = `
            <input type="text" name="syarat_json[]" class="form-control" placeholder="Contoh: Fotokopi KK">
            <button type="button" class="btn btn-outline-danger remove-syarat">
                <i class="bi bi-trash"></i>
            </button>
        `;
                    wrapper.appendChild(div);
                });

                document.addEventListener('click', function(e) {
                    const btn = e.target.closest('.remove-syarat');
                    if (!btn) return;

                    btn.closest('.input-group').remove();

                    // kalau semua terhapus, sisakan 1 input kosong
                    if (wrapper.children.length === 0) {
                        const div = document.createElement('div');
                        div.className = 'input-group mb-2';
                        div.innerHTML = `
                <input type="text" name="syarat_json[]" class="form-control" placeholder="Contoh: Fotokopi KTP">
                <button type="button" class="btn btn-outline-danger remove-syarat">
                    <i class="bi bi-trash"></i>
                </button>
            `;
                        wrapper.appendChild(div);
                    }
                });

            });
        </script>
    @endpush

@endsection
