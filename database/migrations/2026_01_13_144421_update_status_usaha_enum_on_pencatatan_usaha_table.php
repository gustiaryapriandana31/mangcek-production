<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateStatusUsahaEnumOnPencatatanUsahaTable extends Migration
{
    public function up()
    {
        DB::statement("
            ALTER TABLE pencatatan_usaha
            MODIFY status_usaha 
            ENUM('tidak_ditemukan', 'ditemukan', 'tutup', 'ganda')
            NOT NULL
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE pencatatan_usaha
            MODIFY status_usaha 
            ENUM('aktif', 'tidak_aktif', 'tutup', 'pindah')
            NOT NULL
        ");
    }
}
