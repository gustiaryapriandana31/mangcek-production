<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;

class DataMatchaImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    public int $totalExcel = 0;
    public int $inserted = 0;
    public array $skipped = [];

    public function collection(Collection $rows)
    {
        $this->totalExcel += $rows->count();
        $data = [];

        foreach ($rows as $row) {
            /** @var array $row */
            $idsbr = trim($row['idsbr'] ?? '');
            
            // Validasi wajib
            if (!$idsbr) {
                $this->skipped[] = ['kode' => 'unknown', 'alasan' => 'idsbr kosong'];
                continue;
            }

            $data[] = [
                'idsbr'           => substr($idsbr, 0, 255),
                'alamat_usaha'    => mb_substr(trim($row['alamat_usaha'] ?? ''), 0, 1000),
                'alamat_usaha_gc' => mb_substr(trim($row['alamat_usaha_gc'] ?? ''), 0, 1000),
                'gc_username'     => mb_substr(trim($row['gc_username'] ?? ''), 0, 255),
                'gcid'            => mb_substr(trim($row['gcid'] ?? ''), 0, 1000),
                'gcs_result'      => is_numeric(trim($row['gcs_result'] ?? '')) ? (int) trim($row['gcs_result']) : null,
                'kddesa'          => substr(trim($row['kddesa'] ?? ''), 0, 10),
                'kdkab'           => substr(trim($row['kdkab'] ?? ''), 0, 10),
                'kdkec'           => substr(trim($row['kdkec'] ?? ''), 0, 10),
                'kdprov'          => substr(trim($row['kdprov'] ?? ''), 0, 10),
                'kegiatan_usaha'  => mb_substr(trim($row['kegiatan_usaha'] ?? ''), 0, 1000),
                'kode_wilayah'    => substr(trim($row['kode_wilayah'] ?? ''), 0, 20),
                'latitude'        => is_numeric(trim($row['latitude'] ?? '')) ? (float) trim($row['latitude']) : null,
                'latitude_gc'     => is_numeric(trim($row['latitude_gc'] ?? '')) ? (float) trim($row['latitude_gc']) : null,
                'longitude'       => is_numeric(trim($row['longitude'] ?? '')) ? (float) trim($row['longitude']) : null,
                'longitude_gc'    => is_numeric(trim($row['longitude_gc'] ?? '')) ? (float) trim($row['longitude_gc']) : null,
                'nama_usaha'      => mb_substr(trim($row['nama_usaha'] ?? ''), 0, 255),
                'nama_usaha_gc'   => mb_substr(trim($row['nama_usaha_gc'] ?? ''), 0, 255),
                'nmdesa'          => mb_substr(trim($row['nmdesa'] ?? ''), 0, 255),
                'nmkab'           => mb_substr(trim($row['nmkab'] ?? ''), 0, 255),
                'nmkec'           => mb_substr(trim($row['nmkec'] ?? ''), 0, 255),
                'nmprov'          => mb_substr(trim($row['nmprov'] ?? ''), 0, 255),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        }

        // Bulk insert pakai chunk 1000
        $chunks = array_chunk($data, 1000);
        foreach ($chunks as $chunk) {
            // Using DB facade with ignore to skip duplicates safely if re-run
            DB::table('data_matcha')->insertOrIgnore($chunk);
            $this->inserted += count($chunk);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
