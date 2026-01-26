<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /** =========================
         *  nama_usaha
         *  ========================= */
        Schema::table('nama_usaha', function (Blueprint $table) {
            $table->index('kode_nama_usaha', 'idx_nu_kode');
            $table->index('kode_kecamatan', 'idx_nu_kecamatan');
            $table->index('kode_desa', 'idx_nu_desa');
            $table->index(['kode_kecamatan', 'kode_desa'], 'idx_nu_kec_desa');
        });

        /** =========================
         *  pencatatan_usaha
         *  ========================= */
        Schema::table('pencatatan_usaha', function (Blueprint $table) {
            $table->index('kode_nama_usaha', 'idx_pu_kode_usaha');
            $table->index('status_usaha', 'idx_pu_status');
            $table->index('created_at', 'idx_pu_created_at');
        });

        /** =========================
         *  desa
         *  ========================= */
        Schema::table('desa', function (Blueprint $table) {
            $table->index('kode_kecamatan', 'idx_desa_kecamatan');
        });

        /** =========================
         *  kecamatan
         *  ========================= */
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->index('nama_kecamatan', 'idx_kecamatan_nama');
        });
    }

    public function down(): void
    {
        Schema::table('nama_usaha', function (Blueprint $table) {
            $table->dropIndex('idx_nu_kode');
            $table->dropIndex('idx_nu_kecamatan');
            $table->dropIndex('idx_nu_desa');
            $table->dropIndex('idx_nu_kec_desa');
        });

        Schema::table('pencatatan_usaha', function (Blueprint $table) {
            $table->dropIndex('idx_pu_kode_usaha');
            $table->dropIndex('idx_pu_status');
            $table->dropIndex('idx_pu_created_at');
        });

        Schema::table('desa', function (Blueprint $table) {
            $table->dropIndex('idx_desa_kecamatan');
        });

        Schema::table('kecamatan', function (Blueprint $table) {
            $table->dropIndex('idx_kecamatan_nama');
        });
    }
};
