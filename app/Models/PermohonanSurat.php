<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// Hapus atau abaikan baris ini (mereka ada di namespace yang sama):
// use App\Models\Warga;
// use App\Models\JenisSurat;

class PermohonanSurat extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'permohonan_surat';
    protected $primaryKey = 'permohonan_id';
    public $timestamps = true;

    protected $fillable = [
        'nomor_permohonan',
        'pemohon_warga_id',
        'jenis_id',
        'tanggal_pengajuan',
        'status',
        'catatan',
    ];

    /**
     * Daftarkan koleksi media untuk lampiran permohonan.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('permohonan_surat');
    }

    /**
     * Relasi BelongsTo ke Model JenisSurat.
     */
    public function jenisSurat(): BelongsTo
    {
        // Model JenisSurat dipanggil tanpa namespace karena berada di App\Models
        return $this->belongsTo(JenisSurat::class, 'jenis_id', 'jenis_id');
    }

    /**
     * Relasi BelongsTo ke Model Warga (sebagai pemohon).
     */
    public function pemohon(): BelongsTo
    {
        // Model Warga dipanggil tanpa namespace karena berada di App\Models
        return $this->belongsTo(Warga::class, 'pemohon_warga_id', 'warga_id');
    }
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'pemohon_warga_id', 'warga_id');
    }
}
