<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kecamatan')->insert([
            ['kode_kecamatan' => '16.10.01', 'nama_kecamatan' => 'Muara Kuang'],
            ['kode_kecamatan' => '16.10.02', 'nama_kecamatan' => 'Tanjung Batu'],
            ['kode_kecamatan' => '16.10.03', 'nama_kecamatan' => 'Tanjung Raja'],
            ['kode_kecamatan' => '16.10.04', 'nama_kecamatan' => 'Indralaya'],
            ['kode_kecamatan' => '16.10.05', 'nama_kecamatan' => 'Pemulutan'],
            ['kode_kecamatan' => '16.10.06', 'nama_kecamatan' => 'Rantau Alai'],
            ['kode_kecamatan' => '16.10.07', 'nama_kecamatan' => 'Indralaya Utara'],
            ['kode_kecamatan' => '16.10.08', 'nama_kecamatan' => 'Indralaya Selatan'],
            ['kode_kecamatan' => '16.10.09', 'nama_kecamatan' => 'Pemulutan Selatan'],
            ['kode_kecamatan' => '16.10.10', 'nama_kecamatan' => 'Pemulutan Barat'],
            ['kode_kecamatan' => '16.10.11', 'nama_kecamatan' => 'Rantau Panjang'],
            ['kode_kecamatan' => '16.10.12', 'nama_kecamatan' => 'Sungai Pinang'],
            ['kode_kecamatan' => '16.10.13', 'nama_kecamatan' => 'Kandis'],
            ['kode_kecamatan' => '16.10.14', 'nama_kecamatan' => 'Rambang Kuang'],
            ['kode_kecamatan' => '16.10.15', 'nama_kecamatan' => 'Lubuk Keliat'],
            ['kode_kecamatan' => '16.10.16', 'nama_kecamatan' => 'Payaraman'],
        ]);
    }
}
