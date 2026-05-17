<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $fillable = [
        'nama_alat', 'harga_per_hari', 'stok',
        'foto', 'deskripsi', 'Admin_id_admin'
    ];

    // Relasi ke admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_id_admin', 'id_admin');
    }

    // Relasi ke detail pemesanan
    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'Alat_id_alat', 'id_alat');
    }
}
