<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'name',
        'email',
        'password',
        'role',
];
    protected $hidden = ['password','remember_token'];

    public function warga()
    {
        return $this->hasOne(Warga::class, 'user_id', 'id');
    }
    public function scopeFilter($query, $request, $filterableColumns)
{
    foreach ($filterableColumns as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->$column);
        }
    }
    return $query;
}

public function scopeSearch($query, $request, $searchableColumns)
{
    if ($request->filled('search')) {
        $keyword = $request->search;
        $query->where(function ($q) use ($searchableColumns, $keyword) {
            foreach ($searchableColumns as $column) {
                $q->orWhere($column, 'LIKE', "%{$keyword}%");
            }
        });
    }
    return $query;
}
}

