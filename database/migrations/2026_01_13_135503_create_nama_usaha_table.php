<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaUsahaTable extends Migration
{
    public function up()
    {
        Schema::create('nama_usaha', function (Blueprint $table) {

            // PRIMARY KEY (unik, cepat untuk lookup)
            $table->string('kode_nama_usaha', 50)->primary();

            // Foreign key logic (belum FK fisik, tapi di-index)
            $table->string('kode_desa', 20)->index();
            $table->string('kode_kecamatan', 20)->index();

            // Data utama
            $table->string('nama_usaha', 255)->index();
            $table->text('alamat')->nullable();

            $table->string('status_profiling_sbr', 50)->nullable()->index();

            $table->timestamps();

            // OPTIONAL: composite index jika sering dipakai bersamaan
            $table->index(
                ['kode_kecamatan', 'kode_desa'],
                'idx_kecamatan_desa'
            );
        });
    }

    public function down()
    {
        Schema::dropIfExists('nama_usaha');
    }
}
