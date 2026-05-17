<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alat', function (Blueprint $table) {
            if (!Schema::hasColumn('alat', 'harga_perhari')) {
                $table->integer('harga_perhari')->default(0)->after('harga');
            }
            if (!Schema::hasColumn('alat', 'gambar')) {
                $table->string('gambar')->nullable()->after('stok');
            }
            if (!Schema::hasColumn('alat', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('gambar');
            }
            if (!Schema::hasColumn('alat', 'brand')) {
                $table->string('brand')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('alat', 'berat')) {
                $table->string('berat')->nullable()->after('brand');
            }
            if (!Schema::hasColumn('alat', 'material')) {
                $table->string('material')->nullable()->after('berat');
            }
            if (!Schema::hasColumn('alat', 'kategori')) {
                $table->string('kategori')->nullable()->after('material');
            }
        });
    }

    public function down(): void
    {
        Schema::table('alat', function (Blueprint $table) {
            $table->dropColumn(['harga_perhari', 'gambar', 'deskripsi', 'brand', 'berat', 'material', 'kategori']);
        });
    }
};
