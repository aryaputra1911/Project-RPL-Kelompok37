<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Hapus FK lama id_alat dan id_user
            if (Schema::hasColumn('pemesanan', 'id_alat')) {
                $table->dropForeign(['id_alat']);
            }
            if (Schema::hasColumn('pemesanan', 'id_user')) {
                $table->dropForeign(['id_user']);
            }
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            // Hapus kolom yang tidak ada di diagram
            $dropCols = [];
            foreach (['id_alat', 'jumlah_alat'] as $col) {
                if (Schema::hasColumn('pemesanan', $col)) {
                    $dropCols[] = $col;
                }
            }
            if (!empty($dropCols)) {
                $table->dropColumn($dropCols);
            }
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            // Rename id_user → Users_id_user sesuai diagram
            if (Schema::hasColumn('pemesanan', 'id_user')) {
                $table->renameColumn('id_user', 'Users_id_user');
            }
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            // Tambahkan kembali FK untuk Users_id_user
            $table->foreign('Users_id_user')->references('id_user')->on('user')->onDelete('cascade');

            // Tambah FK ke admin
            if (!Schema::hasColumn('pemesanan', 'Admin_id_admin')) {
                $table->unsignedBigInteger('Admin_id_admin')->nullable();
                $table->foreign('Admin_id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanan', 'Admin_id_admin')) {
                $table->dropForeign(['Admin_id_admin']);
                $table->dropColumn('Admin_id_admin');
            }

            $table->dropForeign(['Users_id_user']);
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanan', 'Users_id_user')) {
                $table->renameColumn('Users_id_user', 'id_user');
            }
        });

        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');

            $table->unsignedBigInteger('id_alat')->nullable();
            $table->foreign('id_alat')->references('id_alat')->on('alat')->onDelete('cascade');
            $table->integer('jumlah_alat')->default(1);
        });
    }
};
