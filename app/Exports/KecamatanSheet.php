<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class KecamatanSheet implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
    return DB::table('pencatatan_usaha as pu')
        ->join('nama_usaha as nu', 'pu.kode_nama_usaha', '=', 'nu.kode_nama_usaha')
        ->join('kecamatan as k', 'nu.kode_kecamatan', '=', 'k.kode_kecamatan')
        ->select(
            'k.kode_kecamatan',
            'k.nama_kecamatan',
            DB::raw('COUNT(pu.id) as total_usaha')
        )
        ->groupBy('k.kode_kecamatan', 'k.nama_kecamatan')
        ->orderByDesc('total_usaha')
        ->get();
    }

    public function headings(): array
    {
        return ['Kode Kecamatan', 'Nama Kecamatan', 'Total Usaha'];
    }

    public function title(): string
    {
        return 'Grouping Kecamatan';
    }

}
