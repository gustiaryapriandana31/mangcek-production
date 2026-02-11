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

class DesaSheet implements
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

        $grandTotal = $data->sum('total_usaha');

        // Baris kosong
        $data->push((object)[
            'kode_desa' => '',
            'nama_desa' => '',
            'total_usaha' => ''
        ]);

        // Grand Total
        $data->push((object)[
            'kode_desa' => '',
            'nama_desa' => 'GRAND TOTAL',
            'total_usaha' => $grandTotal
        ]);

        $this->rowCount = $data->count() + 1; // +1 header

        return $data;
    }

    public function headings(): array
    {
        return ['Kode Desa', 'Nama Desa', 'Total Usaha'];
    }

    public function title(): string
    {
        return 'Grouping Desa';
    }

    public function styles(Worksheet $sheet)
    {
        // HEADER STYLE
        $sheet->getStyle('A1:C1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'E5E7EB']
            ],
        ]);

        $lastRow = $this->rowCount;

        // GRAND TOTAL STYLE
        $sheet->getStyle("A{$lastRow}:C{$lastRow}")
            ->applyFromArray([
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FDE68A']
                ],
            ]);

        // BORDER ALL
        $sheet->getStyle("A1:C{$lastRow}")
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);
    }
}
