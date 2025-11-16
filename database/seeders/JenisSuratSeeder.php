<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        JenisSurat::create([
            'kode' => 'SKTM',
            'nama_jenis' => 'Surat Keterangan Tidak Mampu',
            'syarat_json' => [
                'KTP',
                'KK',
                'Surat Pengantar RT'
            ],
        ]);

        JenisSurat::create([
            'kode' => 'DOM',
            'nama_jenis' => 'Surat Domisili',
            'syarat_json' => [
                'KTP',
                'KK'
            ],
        ]);
    }
}
