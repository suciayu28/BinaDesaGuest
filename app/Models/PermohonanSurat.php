<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermohonanSurat extends Model
{
    use HasFactory;

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

    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
    ];

    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_id', 'jenis_id');
    }

    public function pemohon(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'pemohon_warga_id', 'warga_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'pemohon_warga_id', 'warga_id');
    }

    public function berkas()
    {
        return $this->hasMany(BerkasPersyaratan::class, 'permohonan_id');
    }

    /** =====================
     *  RELASI MEDIA AMAN
     *  ===================== */
    public function lampiran()
    {
        return $this->hasMany(Media::class, 'ref_id', 'permohonan_id')
                    ->where('ref_table', 'permohonan_surat')
                    ->orderBy('sort_order');
    }

    public function riwayatStatus()
    {
        return $this->hasMany(
            RiwayatStatusSurat::class,
            'permohonan_id',
            'permohonan_id'
        )->orderBy('waktu', 'desc');
    }
    
}
