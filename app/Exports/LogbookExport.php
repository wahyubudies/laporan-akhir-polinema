<?php

namespace App\Exports;

use App\Models\DataLogbook;
use App\Models\Logbook;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LogbookExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $idDataLogbook;
    public function __construct($idDataLogbook)
    {
        $this->idDataLogbook = $idDataLogbook;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idDataLogbook = $this->idDataLogbook;
        return Logbook::whereHas('DataLogbook', function($query) use ($idDataLogbook){
            $query->where('logbooks.data_logbook_id', $idDataLogbook);
        })->select('narasi', 'created_at')->get();        
    }
    
    public function headings(): array
    {
        return [
            'Narasi',
            'Tanggal'
        ];
    }    

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]]
        ];
    }
}
