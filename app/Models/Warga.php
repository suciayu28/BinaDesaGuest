<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
  protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    public $incrementing = true; // Asumsi ID di-generate oleh DB
    protected $fillable = [
        'no_ktp', 'nama', 'jenis_kelamin', 'agama', 'pekerjaan', 'telp', 'email','password'
    ];
    // Sembunyikan password saat diubah menjadi array atau JSON
    protected $hidden = [
        'password',
    ];
}
