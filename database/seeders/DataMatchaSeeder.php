<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataMatchaImport;

class DataMatchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan FK & hapus semua data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('data_matcha')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Import Excel
        $import = new DataMatchaImport();
        Excel::import(
            $import,
            storage_path('app/excel/data_matcha.xlsx')
        );

        // Hasil import
        dump('===== HASIL IMPORT DATA MATCHA =====');
        dump('Total Excel : ' . $import->totalExcel);
        dump('Masuk       : ' . $import->inserted);
        dump('Skip        : ' . count($import->skipped));

        if (!empty($import->skipped)) {
            dump('Contoh skip:', array_slice($import->skipped, 0, 10));
        }
    }
}
