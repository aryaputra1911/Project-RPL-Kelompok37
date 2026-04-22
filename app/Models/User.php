<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel di database
    protected $table = 'user';

    // Primary Key yang Anda gunakan di ERD
    protected $primaryKey = 'id_user';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama', 
        'email', 
        'no_telp', 
        'password'
    ];

    // Menyembunyikan password saat data user ditampilkan (misal di API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Otomatis melakukan hashing saat password diisi (Laravel 10+)
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function pemesanan()
    {
        // User mempunyai banyak (hasMany) Pemesanan
        return $this->hasMany(Pemesanan::class, 'id_user', 'id_user');
    }
}