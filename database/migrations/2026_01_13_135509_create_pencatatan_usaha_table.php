<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanUsahaTable extends Migration
{
    public function up()
    {
        Schema::create('pencatatan_usaha', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_nama_usaha');
            $table->enum('status_usaha', ['aktif','tidak_aktif','tutup','pindah']);
            $table->string('photo_path')->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->string('nama_petugas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pencatatan_usaha');
    }
}
