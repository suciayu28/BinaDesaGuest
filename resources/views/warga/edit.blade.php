
@extends('layouts.warga.edit.app')
@section('content')
<div class="content-wrap">
    <div class="container">
        <div class="card-form">
            {{-- Asumsi $warga adalah variabel data warga yang akan diedit --}}
            @php
                $warga = [
                    'id' => 1,
                    'no_ktp' => '3201011203900001',
                    'nama' => 'Budi Santoso',
                    'jenis_kelamin' => 'Laki-laki',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Petani',
                    'telp' => '081234567890',
                    'email' => 'budi.s@desa.id',
                ];
            @endphp

            <h1 class="mb-4 text-start" style="color: var(--primary-color);">
                <i class="fas fa-user-edit me-2"></i> Edit Data Warga: {{ $warga['nama'] }}
            </h1>

            @if(session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p class="fw-bold"><i class="fas fa-exclamation-triangle me-1"></i> Terjadi Kesalahan:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Ganti route('warga.update', $warga->id) dengan sintaks framework Anda --}}
            <form action="{{ route('warga.update', $warga['id']) }}" method="POST">
                @csrf
                @method('PUT') {{-- Method spoofing untuk update --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. KTP</label>
                        {{-- Menggunakan 'old' untuk menjaga nilai jika validasi gagal, atau nilai dari $warga --}}
                        <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga['no_ktp']) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga['nama']) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            {{-- Menggunakan 'old' atau nilai dari $warga untuk menentukan yang dipilih --}}
                            <option value="Laki-laki" {{ old('jenis_kelamin', $warga['jenis_kelamin']) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $warga['jenis_kelamin']) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga['agama']) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga['pekerjaan']) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga['telp']) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email (Digunakan untuk Login)</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $warga['email']) }}" required>
                    <div class="form-text">Mengubah email akan mengubah akun login warga.</div>
                </div>

                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle me-1"></i> Kosongkan kolom password di bawah jika Anda **TIDAK** ingin mengubah password.
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ganti">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Kosongkan jika tidak ingin ganti">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-sync-alt me-1"></i> Perbarui Data</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

