<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            // Relasi 1 to 1 ke pemesanan
            $table->foreignId('id_pesanan')->unique()->constrained('pemesanan', 'id_pesanan')->onDelete('cascade');
            $table->integer('total_biaya');
            $table->string('status_bayar'); // misal: belum_bayar, lunas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
