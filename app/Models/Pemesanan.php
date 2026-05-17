<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['Users_id_user', 'Admin_id_admin', 'tgl_sewa', 'tgl_kembali', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'Users_id_user', 'id_user');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_id_admin', 'id_admin');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_pesanan', 'id_pesanan');
    }

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'Pemesanan_id_pesanan', 'id_pesanan');
    }

    /**
     * Accessor: ambil alat dari detail pertama (backward compat untuk view).
     */
    public function getAlatAttribute()
    {
        $detail = $this->detailPemesanan->first();
        return $detail ? $detail->alat : null;
    }

    /**
     * Accessor: ambil jumlah_alat dari detail pertama (backward compat untuk view).
     */
    public function getJumlahAlatAttribute()
    {
        $detail = $this->detailPemesanan->first();
        return $detail ? $detail->jumlah : 0;
    }
}
