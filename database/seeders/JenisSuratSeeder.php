<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode' => 'SKD',
                'nama_jenis' => 'Surat Keterangan Domisili',
                'syarat_json' => [
                    'Fotokopi KTP',
                    'Fotokopi KK'
                ],
            ],
            [
                'kode' => 'SKU',
                'nama_jenis' => 'Surat Keterangan Usaha',
                'syarat_json' => [
                    'Fotokopi KTP',
                    'Surat Pengantar RT'
                ],
            ],
            [
                'kode' => 'SKTM',
                'nama_jenis' => 'Surat Keterangan Tidak Mampu',
                'syarat_json' => [
                    'Fotokopi KTP',
                    'Fotokopi KK'
                ],
            ],
            [
                'kode' => 'SKCK',
                'nama_jenis' => 'Surat Pengantar SKCK',
                'syarat_json' => [
                    'Fotokopi KTP',
                    'Fotokopi KK',
                    'Pas Foto 4x6'
                ],
            ],
        ];

        foreach ($data as $item) {
            JenisSurat::create($item);
        }
    }
}
