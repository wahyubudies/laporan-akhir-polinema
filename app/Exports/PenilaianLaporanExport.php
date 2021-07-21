<?php

namespace App\Exports;

use App\Models\PenilaianLaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenilaianLaporanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenilaianLaporan::all();
    }
    public function headings(): array
    {
        return [
            'No',
            'judul',
            'Dosen Pembimbing 1',
            'Dosen Pembimbing 2',
            'Nilai Dosen Pembimbing 1',
            'Nilai Dosen Pembimbing 2',
            'Dosen Penguji 1',
            'Dosen Penguji 2',
            'Nilai Dosen Penguji 1',
            'Nilai Dosen Penguji 2',
            'Created At',
            'Update At'
        ];
    }
}
