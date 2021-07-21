<?php

namespace App\Exports;

use App\Models\RekapLaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapLaporanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RekapLaporan::all();
    }
    public function headings(): array
    {
        return [
            'No',
            'Judul Laporan',
            'Dosen Pembimbing 1',
            'Dosen Pembimbing 2',
            'Link Drive Mahasiswa',
            'Created At',
            'Updated At'
        ];
    }
}
