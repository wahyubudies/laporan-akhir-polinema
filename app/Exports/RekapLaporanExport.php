<?php

namespace App\Exports;

use App\Models\RekapLaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RekapLaporanExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RekapLaporan::select(
            'judul',
            'dosen_pembimbing_1',
            'dosen_pembimbing_2',
            'link_drive',
            'created_at',
            'updated_at'
        )->get();
    }
    public function headings(): array
    {
        return [            
            'Judul Laporan',
            'Dosen Pembimbing 1',
            'Dosen Pembimbing 2',
            'Link Drive Mahasiswa',
            'Dibuat',
            'Disunting'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
