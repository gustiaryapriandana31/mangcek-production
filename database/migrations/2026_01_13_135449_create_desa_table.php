<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->string('kode_desa')->primary();
            $table->string('kode_kecamatan');
            $table->string('nama_desa');
            $table->timestamps();

            $table->foreign('kode_kecamatan')
                ->references('kode_kecamatan')
                ->on('kecamatan')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('desa');
    }
}
