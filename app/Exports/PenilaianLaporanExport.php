<?php

namespace App\Exports;

use App\Models\PenilaianLaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenilaianLaporanExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenilaianLaporan::select(
            'judul',
            'dosen_pembimbing_1',
            'dosen_pembimbing_2',
            'nilai_dospem_1',
            'nilai_dospem_2',
            'dosen_penguji_1',
            'dosen_penguji_2',
            'nilai_dospeng_1',
            'nilai_dospeng_2',
            'created_at',
            'updated_at'
        )->get();
    }
    public function headings(): array
    {
        return [
            'judul',
            'Dosen Pembimbing 1',
            'Dosen Pembimbing 2',
            'Nilai Dosen Pembimbing 1',
            'Nilai Dosen Pembimbing 2',
            'Dosen Penguji 1',
            'Dosen Penguji 2',
            'Nilai Dosen Penguji 1',
            'Nilai Dosen Penguji 2',
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
