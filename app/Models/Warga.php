<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    public $incrementing = true;

    // TAMBAHKAN 'user_id' di sini
    protected $fillable = [
        'user_id',
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    // Casting email_verified_at TIDAK diperlukan jika kolom tersebut tidak ada di tabel warga
    // Jika Anda memang memilikinya, pertahankan. Jika tidak, hapus.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        // Relasi sudah benar: belongsTo(Target Model, Foreign Key di model ini, Local Key di target model)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }
}
