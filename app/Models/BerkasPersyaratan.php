<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerkasPersyaratan extends Model
{
    protected $table      = 'berkas_persyaratan';
    protected $primaryKey = 'berkas_id';

    protected $fillable = [
        'permohonan_id',
        'nama_berkas',
        'valid',
    ];

    public function permohonan()
    {
        return $this->belongsTo(PermohonanSurat::class, 'permohonan_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'berkas_id')
            ->where('ref_table', 'berkas_persyaratan')
            ->orderBy('sort_order');
    }
}
