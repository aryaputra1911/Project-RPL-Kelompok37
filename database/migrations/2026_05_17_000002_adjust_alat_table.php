<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alat', function (Blueprint $table) {
            // Hapus kolom yang tidak ada di diagram
            $columns = [];
            foreach (['harga', 'brand', 'berat', 'material', 'kategori'] as $col) {
                if (Schema::hasColumn('alat', $col)) {
                    $columns[] = $col;
                }
            }
            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });

        Schema::table('alat', function (Blueprint $table) {
            // Rename kolom sesuai diagram
            if (Schema::hasColumn('alat', 'harga_perhari')) {
                $table->renameColumn('harga_perhari', 'harga_per_hari');
            }
            if (Schema::hasColumn('alat', 'gambar')) {
                $table->renameColumn('gambar', 'foto');
            }
        });

        Schema::table('alat', function (Blueprint $table) {
            // Tambah FK ke admin
            if (!Schema::hasColumn('alat', 'Admin_id_admin')) {
                $table->unsignedBigInteger('Admin_id_admin')->nullable()->after('foto');
                $table->foreign('Admin_id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('alat', function (Blueprint $table) {
            if (Schema::hasColumn('alat', 'Admin_id_admin')) {
                $table->dropForeign(['Admin_id_admin']);
                $table->dropColumn('Admin_id_admin');
            }
        });

        Schema::table('alat', function (Blueprint $table) {
            if (Schema::hasColumn('alat', 'harga_per_hari')) {
                $table->renameColumn('harga_per_hari', 'harga_perhari');
            }
            if (Schema::hasColumn('alat', 'foto')) {
                $table->renameColumn('foto', 'gambar');
            }
        });

        Schema::table('alat', function (Blueprint $table) {
            $table->integer('harga')->default(0)->after('nama_alat');
            $table->string('brand')->nullable();
            $table->string('berat')->nullable();
            $table->string('material')->nullable();
            $table->string('kategori')->nullable();
        });
    }
};
