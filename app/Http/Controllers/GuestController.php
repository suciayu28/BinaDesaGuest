<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function layananSurat()
    {
        $daftarSurat = [
            [
                'jenis_id' => 101,
                'kode' => 'KTR-U',
                'nama_jenis' => 'Surat Keterangan Usaha',
                'syarat_json' => ['Fotokopi KTP', 'Fotokopi KK', 'Pengantar RT/RW'],
                // Keterangan KTR-U
                'keterangan_tambahan' => 'Khusus untuk UMKM yang terdaftar di RT/RW setempat.',
            ],
            [
                'jenis_id' => 102,
                'kode' => 'PD-DOM',
                'nama_jenis' => 'Surat Pengantar Pindah Domisili',
                'syarat_json' => ['Formulir F-1.03', 'Surat Keterangan Lurah', 'Fotokopi KK'],
                // Keterangan PD-DOM
                'keterangan_tambahan' => 'Wajib lampirkan bukti lunas PBB tahun terakhir.',
            ],
            [
                'jenis_id' => 103,
                'kode' => 'KTR-TM',
                'nama_jenis' => 'Surat Keterangan Tidak Mampu',
                'syarat_json' => ['Surat Miskin dari Puskesmas', 'KTP & KK Asli', 'Foto Rumah'],
                // Keterangan KTR-TM
                'keterangan_tambahan' => 'Surat berlaku selama 6 bulan sejak tanggal penandatanganan.',
            ],
        ];

        /* Mengirim data menggunakan fungsi compact() */
        return view('layanan_surat', compact('daftarSurat'));
    }
}
