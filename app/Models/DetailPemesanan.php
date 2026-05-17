<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;

    protected $fillable = [
        'Pemesanan_id_pesanan', 'Pemesanan_Users_id_user',
        'Alat_id_alat', 'jumlah', 'subtotal', 'id_admin'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'Pemesanan_id_pesanan', 'id_pesanan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'Pemesanan_Users_id_user', 'id_user');
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'Alat_id_alat', 'id_alat');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
