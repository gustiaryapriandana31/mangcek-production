<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        $desa = [

            // ================= Muara Kuang =================
            ['16.10.01','Kelampadu'],['16.10.01','Kasah'],['16.10.01','Kuang Anyar'],
            ['16.10.01','Munggu'],['16.10.01','Nagasari'],['16.10.01','Ramakasih'],
            ['16.10.01','Rantau Sialang'],['16.10.01','Seri Kembang'],
            ['16.10.01','Seri Menanti'],['16.10.01','Suka Cinta'],
            ['16.10.01','Sukajadi'],['16.10.01','Tanabang Ilir'],
            ['16.10.01','Tanabang Ulu'],['16.10.01','Muara Kuang'],

            // ================= Tanjung Batu =================
            ['16.10.02','Bangun Jaya'],['16.10.02','Burai'],['16.10.02','Limbang Jaya I'],
            ['16.10.02','Limbang Jaya II'],['16.10.02','Pajar Bulan'],
            ['16.10.02','Sentul'],['16.10.02','Senuro Barat'],
            ['16.10.02','Senuro Timur'],['16.10.02','Seri Bandung'],
            ['16.10.02','Seri Tanjung'],['16.10.02','Tanjung Atap'],
            ['16.10.02','Tanjung Atap Barat'],['16.10.02','Tanjung Baru Petai'],
            ['16.10.02','Tanjung Batu Seberang'],['16.10.02','Tanjung Laut'],
            ['16.10.02','Tanjung Pinang I'],['16.10.02','Tanjung Pinang II'],
            ['16.10.02','Tanjung Tambak'],['16.10.02','Tanjung Tambak Baru'],
            ['16.10.02','Tanjung Batu'],['16.10.02','Tanjung Batu Timur'],

            // ================= Tanjung Raja =================
            ['16.10.03','Belanti'],['16.10.03','Kerinjing'],['16.10.03','Siring Alam'],
            ['16.10.03','Skonjing'],['16.10.03','Seri Dalam'],['16.10.03','Suka Pindah'],
            ['16.10.03','Talang Balai Baru I'],['16.10.03','Talang Balai Baru II'],
            ['16.10.03','Talang Balai Lama'],['16.10.03','Tanjung Agas'],
            ['16.10.03','Tanjung Harapan'],['16.10.03','Tanjung Raja Selatan'],
            ['16.10.03','Tanjung Temiang'],['16.10.03','Ulak Kerbau Baru'],
            ['16.10.03','Ulak Kerbau Lama'],
            ['16.10.03','Tanjung Raja'],['16.10.03','Tanjung Raja Barat'],
            ['16.10.03','Tanjung Raja Timur'],['16.10.03','Tanjung Raja Utara'],

            // ================= Indralaya =================
            ['16.10.04','Lubuk Sakti'],['16.10.04','Muara Penimbung Ilir'],
            ['16.10.04','Muara Penimbung Ulu'],['16.10.04','Penyandingan'],
            ['16.10.04','Sakatiga'],['16.10.04','Sakatiga Seberang'],
            ['16.10.04','Sejaro Sakti'],['16.10.04','Sudimampir'],
            ['16.10.04','Talang Aur'],['16.10.04','Tanjung Agung'],
            ['16.10.04','Tanjung Gelam'],['16.10.04','Tanjung Sejaro'],
            ['16.10.04','Tanjung Seteko'],['16.10.04','Tunas Aur'],
            ['16.10.04','Ulak Banding'],['16.10.04','Ulak Bedil'],
            ['16.10.04','Ulak Segelung'],
            ['16.10.04','Indralaya Indah'],['16.10.04','Indralaya Mulya'],
            ['16.10.04','Indralaya Raya'],

            // ================= Indralaya Selatan =================
            ['16.10.08','Arisan Gading'],['16.10.08','Beti'],['16.10.08','Mandi Angin'],
            ['16.10.08','Meranjat I'],['16.10.08','Meranjat II'],
            ['16.10.08','Meranjat III'],['16.10.08','Meranjat Ilir'],
            ['16.10.08','Sukaraja Baru'],['16.10.08','Sukaraja Lama'],
            ['16.10.08','Tanjung Dayang Selatan'],
            ['16.10.08','Tanjung Dayang Utara'],['16.10.08','Tanjung Lubuk'],
            ['16.10.08','Tebing Gerinting Selatan'],
            ['16.10.08','Tebing Gerinting Utara'],

            // ================= Indralaya Utara =================
            ['16.10.07','Bakung'],['16.10.07','Lorok'],['16.10.07','Palem Raya'],
            ['16.10.07','Parit'],['16.10.07','Payakabung'],
            ['16.10.07','Permata Baru'],['16.10.07','Pulau Kabai'],
            ['16.10.07','Pulau Semambu'],['16.10.07','Purnajaya'],
            ['16.10.07','Soak Batok'],['16.10.07','Suka Mulia'],
            ['16.10.07','Sungai Rambutan'],['16.10.07','Tanjung Baru'],
            ['16.10.07','Tanjung Pering'],['16.10.07','Tanjung Pule'],
            ['16.10.07','Timbangan'],

            // ================= Kandis =================
            ['16.10.13','Kandis I'],['16.10.13','Kandis II'],['16.10.13','Kumbang Ilir'],
            ['16.10.13','Kumbang Ulu'],['16.10.13','Lubuk Rukam'],
            ['16.10.13','Lubuk Segonang'],['16.10.13','Miji'],
            ['16.10.13','Muara Kumbang'],['16.10.13','Pandan Arang'],
            ['16.10.13','Santapan Barat'],['16.10.13','Santapan Timur'],
            ['16.10.13','Tanjung Alai'],

            // ================= Lubuk Keliat =================
            ['16.10.15','Betung I'],['16.10.15','Betung II'],['16.10.15','Embacang'],
            ['16.10.15','Kasih Raja'],['16.10.15','Ketiau'],
            ['16.10.15','Lubuk Keliat'],['16.10.15','Payalingkung'],
            ['16.10.15','Talang Tengah Darat'],
            ['16.10.15','Talang Tengah Laut'],['16.10.15','Ulak Kembahang'],

            // ================= Payaraman =================
            ['16.10.16','Lubuk Bandung'],['16.10.16','Paya Besar'],
            ['16.10.16','Rengas I'],['16.10.16','Rengas II'],
            ['16.10.16','Seri Kembang I'],['16.10.16','Seri Kembang II'],
            ['16.10.16','Seri Kembang III'],['16.10.16','Talang Seleman'],
            ['16.10.16','Tanjung Lalang'],['16.10.16','Tebedak I'],
            ['16.10.16','Tebedak II'],
            ['16.10.16','Payaraman Barat'],['16.10.16','Payaraman Timur'],
        ];

        $no = 1;
        foreach ($desa as $d) {
            DB::table('desa')->insert([
                'kode_desa' => 'DS' . str_pad($no++, 4, '0', STR_PAD_LEFT),
                'kode_kecamatan' => $d[0],
                'nama_desa' => $d[1],
            ]);
        }
    }
}
