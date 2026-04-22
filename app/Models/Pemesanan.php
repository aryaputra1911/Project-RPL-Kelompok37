<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_user', 'id_alat', 'tgl_sewa', 'tgl_kembali', 'jumlah_alat', 'status'];
}
