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
        Schema::create('data_matcha', function (Blueprint $table) {
            $table->string('idsbr')->primary();
            $table->text('alamat_usaha')->nullable();
            $table->text('alamat_usaha_gc')->nullable();
            $table->string('gc_username')->nullable();
            $table->text('gcid')->nullable(); 
            $table->tinyInteger('gcs_result')->nullable(); // Assuming this is an integer like 1, 2, 3
            
            $table->string('kddesa', 10)->nullable();
            $table->string('kdkab', 10)->nullable();
            $table->string('kdkec', 10)->nullable();
            $table->string('kdprov', 10)->nullable();
            $table->text('kegiatan_usaha')->nullable();
            $table->string('kode_wilayah', 20)->nullable();
            
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('latitude_gc', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('longitude_gc', 11, 8)->nullable();
            
            $table->string('nama_usaha')->nullable();
            $table->string('nama_usaha_gc')->nullable();
            $table->string('nmdesa')->nullable();
            $table->string('nmkab')->nullable();
            $table->string('nmkec')->nullable();
            $table->string('nmprov')->nullable();

            $table->timestamps();

            // Indexes for performance optimization on 60k rows
            $table->index('kdkec');
            $table->index('kddesa');
            $table->index('kode_wilayah');
            $table->index('gcs_result');
            $table->index('nama_usaha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_matcha');
    }
};
