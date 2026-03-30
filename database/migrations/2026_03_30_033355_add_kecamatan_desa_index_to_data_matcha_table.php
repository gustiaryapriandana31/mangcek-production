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
        Schema::table('data_matcha', function (Blueprint $table) {
            // index kecamatan
            $table->index('nmkec', 'idx_nmkec');

            // index desa
            $table->index('nmdesa', 'idx_nmdesa');

            // (opsional tapi sangat direkomendasikan)
            $table->index('nama_usaha', 'idx_nama_usaha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_matcha', function (Blueprint $table) {
            $table->dropIndex('idx_nmkec');
            $table->dropIndex('idx_nmdesa');
            $table->dropIndex('idx_nama_usaha');
        });
    }
};