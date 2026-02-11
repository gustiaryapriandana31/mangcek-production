<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\DB;
class PetugasSheet implements
    FromCollection,
    WithHeadings,
    WithTitle,
    ShouldAutoSize,
    WithStyles
{
    protected $rowCount;

    public function collection()
    {
        $data = DB::table('pencatatan_usaha as pu')
            ->select('nama_petugas', DB::raw('COUNT(pu.id) as total_usaha'))
            ->whereNotNull('nama_petugas')
            ->where('nama_petugas', '!=', '')
            ->groupBy('nama_petugas')
            ->orderByDesc('total_usaha')
            ->get();

        $grandTotal = $data->sum('total_usaha');

        // Tambah baris kosong
        $data->push((object)[
            'nama_petugas' => '',
            'total_usaha' => ''
        ]);

        // Tambah Grand Total
        $data->push((object)[
            'nama_petugas' => 'GRAND TOTAL',
            'total_usaha' => $grandTotal
        ]);

        $this->rowCount = $data->count() + 1; // +1 karena header

        return $data;
    }

    public function headings(): array
    {
        return ['Nama Pegawai', 'Total Usaha'];
    }

    public function title(): string
    {
        return 'Grouping Petugas';
    }

    public function styles(Worksheet $sheet)
    {
        // HEADER STYLE
        $sheet->getStyle('A1:B1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'E5E7EB']
            ],
        ]);

        // GRAND TOTAL STYLE (baris terakhir)
        $lastRow = $this->rowCount;

        $sheet->getStyle("A{$lastRow}:B{$lastRow}")
            ->applyFromArray([
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FDE68A']
                ],
            ]);

        // BORDER ALL
        $sheet->getStyle("A1:B{$lastRow}")
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);
    }
}


