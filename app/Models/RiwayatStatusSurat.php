<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatStatusSurat extends Model
{
    protected $table = 'riwayat_status_surat';
    protected $primaryKey = 'riwayat_id';
    public $timestamps = false;

    protected $fillable = [
        'permohonan_id',
        'status',
        'petugas_warga_id',
        'waktu',
        'keterangan'
    ];

    public function petugas()
    {
        return $this->belongsTo(Warga::class, 'petugas_warga_id');
    }

    public function permohonan()
    {
        return $this->belongsTo(PermohonanSurat::class, 'permohonan_id');
    }
}
