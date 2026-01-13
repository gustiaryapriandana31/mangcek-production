<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaUsahaTable extends Migration
{
    public function up()
    {
        Schema::create('nama_usaha', function (Blueprint $table) {
            $table->string('kode_nama_usaha')->primary();
            $table->string('kode_desa');
            $table->string('kode_kecamatan');
            $table->string('nama_usaha');
            $table->text('alamat')->nullable();
            $table->string('status_profiling_sbr')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nama_usaha');
    }
}
