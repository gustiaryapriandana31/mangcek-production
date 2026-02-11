<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanStatistikExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new PetugasSheet(),
            new KecamatanSheet(),
            new DesaSheet(),
        ];
    }
}

