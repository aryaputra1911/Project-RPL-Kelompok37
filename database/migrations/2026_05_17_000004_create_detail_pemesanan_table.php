<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->id('id_detail');
            $table->integer('jumlah');
            $table->decimal('subtotal', 15, 2);

            // FK ke pemesanan
            $table->unsignedBigInteger('Pemesanan_id_pesanan');
            $table->foreign('Pemesanan_id_pesanan')->references('id_pesanan')->on('pemesanan')->onDelete('cascade');

            // FK ke user
            $table->unsignedBigInteger('Pemesanan_Users_id_user');
            $table->foreign('Pemesanan_Users_id_user')->references('id_user')->on('user')->onDelete('cascade');

            // FK ke alat
            $table->unsignedBigInteger('Alat_id_alat');
            $table->foreign('Alat_id_alat')->references('id_alat')->on('alat')->onDelete('cascade');

            // FK ke admin
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanan');
    }
};
