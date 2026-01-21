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
        Schema::table('pencatatan_usaha', function (Blueprint $table) {
            $table->string('nama_usaha_hasil')->nullable()->after('kode_nama_usaha');
            $table->boolean('nama_usaha_sesuai')->default(true)->after('nama_usaha_hasil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pencatatan_usaha', function (Blueprint $table) {
            //
        });
    }
};
