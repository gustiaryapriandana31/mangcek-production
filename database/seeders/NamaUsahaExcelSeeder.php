<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NamaUsahaImport;
use Illuminate\Support\Facades\DB;

class NamaUsahaExcelSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan FK & hapus semua data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nama_usaha')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Import Excel
        $import = new NamaUsahaImport();
        Excel::import(
            $import,
            storage_path('app/excel/nama_usaha.xlsx')
        );

        // Hasil import
        dump('===== HASIL IMPORT =====');
        dump('Total Excel : ' . $import->totalExcel);
        dump('Masuk       : ' . $import->inserted);
        dump('Skip        : ' . count($import->skipped));

        if (!empty($import->skipped)) {
            dump('Contoh skip:', array_slice($import->skipped, 0, 10));
        }
    }
}
