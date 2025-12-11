<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatStatusSurat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_status_surat';
    protected $primaryKey = 'riwayat_id';

    protected $fillable = [
        'permohonan_id',
        'status',
        'petugas_warga_id',
        'waktu',
        'keterangan'
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];

    // relasi ke permohonan
   public function permohonan()
    {
        return $this->belongsTo(
            PermohonanSurat::class,
            'permohonan_id',
            'permohonan_id'
        );
    }

    // relasi ke petugas (warga)
    public function petugas()
    {
        return $this->belongsTo(
            Warga::class,
            'petugas_warga_id',
            'warga_id'
        );
    }
}
