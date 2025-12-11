@extends('layouts.guest.app')
@section('content')
    {{-- ===================================================== --}}
    {{-- =============== START MAIN CONTENT ================== --}}
    {{-- ===================================================== --}}
    <main class="main">
        <div class="page-title">
            <div class="heading">
                <div class="container text-center">
                    <h1>Ajukan Permohonan Surat: {{ $jenisSurat->nama_jenis ?? 'Surat' }}</h1>
                    <p>Isi formulir di bawah ini untuk mengajukan surat baru.</p>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('guest.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('jenis-surat.index') }}">Jenis Surat</a></li>
                        <li class="current">Formulir Pengajuan</li>
                    </ol>
                </div>
            </nav>
        </div>

        <section class="section py-4">
            <div class="container">

                {{-- AREA PESAN ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong>Gagal!</strong> Harap perbaiki kesalahan input di bawah ini:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        {{-- ==================================================================== --}}
                        {{-- FORMULIR UTAMA: SEMUA INPUT DAN TOMBOL SUBMIT ADA DI SINI --}}
                        {{-- ==================================================================== --}}
                        <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Input Tersembunyi (Hanya jenis_id) --}}
                            <input type="hidden" name="jenis_id" value="{{ $jenisSurat->jenis_id }}">

                            {{-- ============= BAGIAN DATA PERMOHONAN ============= --}}
                            <h6 class="text-primary mb-3 mt-4 border-bottom pb-1">Detail Pengajuan</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis Surat</label>
                                    <input type="text" class="form-control"
                                        value="{{ $jenisSurat->nama_jenis ?? 'Nama Surat Tidak Ditemukan' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ date('d/m/Y') }}" readonly>
                                </div>
                            </div>

                            {{-- ============= BAGIAN DATA PEMOHON (DROPDOWN PILIH WARGA) ============= --}}
                            <h6 class="text-primary mb-3 mt-4 border-bottom pb-1">Pilih Data Pemohon
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pemohon_warga_id" class="form-label">Nama Pemohon (Pilih Warga) <span
                                            class="text-danger">*</span></label>

                                    <select name="pemohon_warga_id" id="pemohon_warga_id"
                                        class="form-control @error('pemohon_warga_id') is-invalid @enderror" required>

                                        <option value="" disabled selected>-- Pilih Warga --</option>

                                        {{-- Loop melalui daftar warga yang dikirim dari Controller --}}
                                        @foreach ($listWarga as $wargaOption)
                                            <option value="{{ $wargaOption->warga_id }}"
                                                {{ old('pemohon_warga_id') == $wargaOption->warga_id ? 'selected' : '' }}>
                                                {{ $wargaOption->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('pemohon_warga_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nik_pemohon_info" class="form-label">NIK Pemohon</label>
                                    {{-- NIK hanya dijadikan display info karena data akan diambil di Controller --}}
                                    <input type="text" id="nik_pemohon_info" class="form-control"
                                        value="NIK akan dicatat berdasarkan pilihan di samping." readonly>
                                </div>
                            </div>
                            {{-- ============= END BAGIAN DATA PEMOHON ============= --}}


                            {{-- ============= BAGIAN KEPERLUAN & CATATAN ============= --}}
                            <h6 class="text-primary mb-3 mt-4 border-bottom pb-1">Tujuan dan Catatan</h6>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan Tambahan / Keperluan <span
                                        class="text-danger">*</span></label>
                                <textarea name="catatan" id="catatan" rows="3" class="form-control @error('catatan') is-invalid @enderror"
                                    placeholder="Jelaskan tujuan dan keperluan Anda mengajukan surat ini (Wajib diisi).">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ============= BAGIAN LAMPIRAN ============= --}}
                            {{-- ============= BAGIAN LAMPIRAN ============= --}}
                            <h6 class="text-primary mb-3 mt-4 border-bottom pb-1">Lampiran Persyaratan</h6>

                            @if (isset($jenisSurat->syarat_json) && is_array($jenisSurat->syarat_json) && count($jenisSurat->syarat_json) > 0)
                                <div class="mb-3 p-3 border rounded bg-light">
                                    <p class="mb-2 small fw-bold">Daftar Persyaratan:</p>
                                    <ul class="list-group list-group-flush small">
                                        @foreach ($jenisSurat->syarat_json as $syarat)
                                            <li class="list-group-item bg-light py-1 ps-0">
                                                <i class="bi bi-dot me-1"></i>{{ $syarat }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="mb-3">
                                <label for="lampiran" class="form-label">
                                    Upload Lampiran (PDF/JPG/PNG, max 5MB / file) <span class="text-danger">*</span>
                                </label>

                                <input type="file" name="lampiran[]" class="form-control" multiple required
                                    accept=".pdf,.jpg,.jpeg,.png">

                                @error('lampiran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('lampiran.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <small class="text-muted">
                                    Unggah beberapa file sesuai persyaratan. Misal: KTP, KK, foto rumah, dan lain-lain.
                                </small>
                            </div>


                            {{-- TOMBOL AKSI --}}
                            <div class="text-end pt-3">
                                <a href="{{ route('jenis-surat.index') }}" class="btn btn-secondary me-2">
                                    <i class="bi bi-arrow-left me-1"></i> Pilih Jenis Surat Lain
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send me-1"></i> Kirim Permohonan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- ===================================================== --}}
    {{-- ================= END MAIN CONTENT ================== --}}
    {{-- ===================================================== --}}
@endsection
