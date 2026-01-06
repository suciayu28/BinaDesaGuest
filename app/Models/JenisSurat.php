<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    // Tentukan Primary Key yang benar
    protected $primaryKey = 'jenis_id';

    // Tentukan nama tabel
    protected $table = 'jenis_surat';

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['kode', 'nama_jenis','syarat_json'];

    /**
     * PENTING: Lakukan Attribute Casting untuk kolom JSON.
     * Mengubah string JSON dari database menjadi Array/Object PHP secara otomatis.
     */
    protected $casts = [
        'syarat_json' => 'array',
        // Anda juga bisa menambahkan casting untuk timestamps (opsional)
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke tabel media (asumsi ada Model Media).
     * Digunakan untuk mengambil template tambahan atau file terkait.
     */
    public function templates()
    {
        // Mencari file di tabel media di mana ref_table = 'jenis_surat' dan ref_id = jenis_id
        return $this->hasMany(Media::class, 'ref_id', 'jenis_id')
                    ->where('ref_table', 'jenis_surat')
                    ->orderBy('sort_order');
    }
}
