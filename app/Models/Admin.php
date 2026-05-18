<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = ['nama', 'email', 'password'];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [];
    }

    public function alat()
    {
        return $this->hasMany(Alat::class, 'Admin_id_admin', 'id_admin');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'Admin_id_admin', 'id_admin');
    }
}
