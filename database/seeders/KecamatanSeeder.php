<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_full' => '1610010', 'nama' => 'Muara Kuang'],
            ['kode_full' => '1610011', 'nama' => 'Rambang Kuang'],
            ['kode_full' => '1610012', 'nama' => 'Lubuk Keliat'],
            ['kode_full' => '1610020', 'nama' => 'Tanjung Batu'],
            ['kode_full' => '1610021', 'nama' => 'Payaraman'],
            ['kode_full' => '1610030', 'nama' => 'Rantau Alai'],
            ['kode_full' => '1610031', 'nama' => 'Kandis'],
            ['kode_full' => '1610040', 'nama' => 'Tanjung Raja'],
            ['kode_full' => '1610041', 'nama' => 'Rantau Panjang'],
            ['kode_full' => '1610042', 'nama' => 'Sungai Pinang'],
            ['kode_full' => '1610050', 'nama' => 'Pemulutan'],
            ['kode_full' => '1610051', 'nama' => 'Pemulutan Selatan'],
            ['kode_full' => '1610052', 'nama' => 'Pemulutan Barat'],
            ['kode_full' => '1610060', 'nama' => 'Indralaya'],
            ['kode_full' => '1610061', 'nama' => 'Indralaya Utara'],
            ['kode_full' => '1610062', 'nama' => 'Indralaya Selatan'],
        ];

        $insertData = [];

        foreach ($data as $item) {
            $insertData[] = [
                'kode_kecamatan' => substr($item['kode_full'], -3), // 🔥 ambil 3 digit terakhir
                'nama_kecamatan' => $item['nama'],
            ];
        }

        DB::table('kecamatan')->insert($insertData);
    }
}
