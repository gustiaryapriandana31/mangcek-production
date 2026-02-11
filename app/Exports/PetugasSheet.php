<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PetugasSheet implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return DB::table('pencatatan_usaha')
            ->select('nama_petugas', DB::raw('COUNT(*) as total_usaha'))
            ->whereNotNull('nama_petugas')
            ->where('nama_petugas', '!=', '')
            ->groupBy('nama_petugas')
            ->orderByDesc('total_usaha')
            ->get();
    }

    public function headings(): array
    {
        return ['Nama Petugas', 'Total Usaha'];
    }

    public function title(): string
    {
        return 'Grouping Petugas';
    }
}

