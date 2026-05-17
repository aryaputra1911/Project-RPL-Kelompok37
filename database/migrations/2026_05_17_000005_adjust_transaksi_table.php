<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Hapus unique constraint pada id_pesanan (diagram tidak menunjukkan 1-to-1)
            if (Schema::hasColumn('transaksi', 'id_pesanan')) {
                $table->dropForeign(['id_pesanan']);
                $table->dropUnique(['id_pesanan']);
            }
        });

        Schema::table('transaksi', function (Blueprint $table) {
            // Tambahkan kembali FK id_pesanan tanpa unique
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pemesanan')->onDelete('cascade');

            // Tambah kolom baru sesuai diagram
            if (!Schema::hasColumn('transaksi', 'metode_bayar')) {
                $table->string('metode_bayar')->nullable()->after('status_bayar');
            }
            if (!Schema::hasColumn('transaksi', 'tgl_transaksi')) {
                $table->timestamp('tgl_transaksi')->nullable()->after('metode_bayar');
            }

            // FK ke user melalui pemesanan
            if (!Schema::hasColumn('transaksi', 'Pemesanan_Users_id_user')) {
                $table->unsignedBigInteger('Pemesanan_Users_id_user')->nullable();
                $table->foreign('Pemesanan_Users_id_user')->references('id_user')->on('user')->onDelete('set null');
            }

            // FK ke admin
            if (!Schema::hasColumn('transaksi', 'id_admin')) {
                $table->unsignedBigInteger('id_admin')->nullable();
                $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            if (Schema::hasColumn('transaksi', 'id_admin')) {
                $table->dropForeign(['id_admin']);
                $table->dropColumn('id_admin');
            }
            if (Schema::hasColumn('transaksi', 'Pemesanan_Users_id_user')) {
                $table->dropForeign(['Pemesanan_Users_id_user']);
                $table->dropColumn('Pemesanan_Users_id_user');
            }
            if (Schema::hasColumn('transaksi', 'tgl_transaksi')) {
                $table->dropColumn('tgl_transaksi');
            }
            if (Schema::hasColumn('transaksi', 'metode_bayar')) {
                $table->dropColumn('metode_bayar');
            }
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_pesanan']);
            $table->unique('id_pesanan');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pemesanan')->onDelete('cascade');
        });
    }
};
