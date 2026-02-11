<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DesaSheet implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
    return DB::table('pencatatan_usaha as pu')
        ->join('nama_usaha as nu', 'pu.kode_nama_usaha', '=', 'nu.kode_nama_usaha')
        ->join('desa as d', 'nu.kode_desa', '=', 'd.kode_desa')
        ->select(
            'd.kode_desa',
            'd.nama_desa',
            DB::raw('COUNT(pu.id) as total_usaha')
        )
        ->groupBy('d.kode_desa', 'd.nama_desa')
        ->orderByDesc('total_usaha')
        ->get();
    }

    public function headings(): array
    {
        return ['Kode Desa', 'Nama Desa', 'Total Usaha'];
    }

    public function title(): string
    {
        return 'Grouping Desa';
    }
}
