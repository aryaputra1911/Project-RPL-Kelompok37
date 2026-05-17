<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_user', 'id_alat', 'tgl_sewa', 'tgl_kembali', 'jumlah_alat', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat', 'id_alat');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_pesanan', 'id_pesanan');
    }
}
