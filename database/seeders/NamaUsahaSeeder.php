<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NamaUsahaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua desa
        $desaList = DB::table('desa')->get();

        // STATUS PROFILING SBR (FIX 4 DATA)
        $profilingStatus = [
            'tidak_ditemukan',
            'ditemukan',
            'tutup',
            'ganda',
        ];

        // Nama usaha dummy
        $usahaDummy = [
            'Toko Sembako',
            'Warung Makan',
            'Bengkel Motor',
            'Laundry',
            'Counter HP',
            'Toko Bangunan',
            'Fotokopi',
            'Cafe',
            'Usaha Jahit',
            'Salon',
        ];

        $data = [];

        foreach ($desaList as $desa) {
            // setiap desa bikin 3 usaha
            for ($i = 1; $i <= 3; $i++) {

                $namaUsaha = $usahaDummy[array_rand($usahaDummy)] . " " . $i;

                $data[] = [
                    'kode_nama_usaha'       => 'NU-' . strtoupper(Str::random(10)),
                    'kode_kecamatan'       => $desa->kode_kecamatan,
                    'kode_desa'            => $desa->kode_desa,
                    'nama_usaha'           => $namaUsaha,
                    'alamat'               => "Jl. {$desa->nama_desa} No. " . rand(1, 200),
                    'status_profiling_sbr' => $profilingStatus[array_rand($profilingStatus)],
                    'created_at'           => now(),
                    'updated_at'           => now(),
                ];
            }
        }

        DB::table('nama_usaha')->insert($data);
    }
}
