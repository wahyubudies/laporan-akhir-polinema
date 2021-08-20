<?php

namespace App\Exports;

use App\Models\DataLogbook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataLogbookExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataLogbook::select(
            'judul',
            'dospem1',
            'dospem2',
            'created_at',
            'updated_at'
        )->get();
    }    

    public function headings(): array
    {
        return [
            'Judul',
            'Dosen Pembimbing 1',
            'Dosen Pembimbing 2',
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
