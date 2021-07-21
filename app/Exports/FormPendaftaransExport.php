<?php

namespace App\Exports;

use App\Models\FormPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormPendaftaransExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormPendaftaran::all();
    }
    public function headings(): array
    {
        return [
            'No',
            'NIM Mahasiswa 1',
            'Nama Mahasiswa 1',
            'NIM Mahasiswa 2',
            'Nama Mahasiswa 2',
            'Judul',
            'Dosen Penyeleksi 1',
            'Dosen Penyeleksi 2',
            'Dosen Penyeleksi 3',
            'File Upload Name'
        ];
    }
}
