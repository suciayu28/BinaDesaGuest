<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermohonanSurat;
use App\Models\Warga;
use App\Models\JenisSurat;

class PermohonanSuratSeeder extends Seeder
{
    public function run(): void
    {
        $warga = Warga::first();         // ambil warga pertama
        $jenis = JenisSurat::first();    // ambil jenis surat pertama

        PermohonanSurat::create([
            'nomor_permohonan' => 'PRM-001',
            'pemohon_warga_id' => $warga->warga_id,
            'jenis_id' => $jenis->jenis_id,
            'tanggal_pengajuan' => now()->toDateString(),
            'status' => 'menunggu',
            'catatan' => 'Contoh permohonan awal',
            'lampiran' => null,
        ]);
    }
}
