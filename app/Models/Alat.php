<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $fillable = [
        'nama_alat', 'harga', 'harga_perhari', 'stok',
        'gambar', 'deskripsi', 'brand', 'berat', 'material', 'kategori'
    ];

    // Relasi ke pemesanan
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_alat', 'id_alat');
    }
}
