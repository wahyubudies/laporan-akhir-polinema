<?php

namespace App\Exports;

use App\Models\FormPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FormPendaftaransExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormPendaftaran::select(
            'nim_mhs_1',
            'nama_mhs_1',
            'nim_mhs_2',
            'nama_mhs_2',
            'judul',
            'dosen_penyeleksi_1',
            'dosen_penyeleksi_2',
            'dosen_penyeleksi_3',
            'file_upload',
            'created_at',
            'updated_at'
        )->get();
    }
    public function headings(): array
    {
        return [
            'NIM Mahasiswa 1',
            'Nama Mahasiswa 1',
            'NIM Mahasiswa 2',
            'Nama Mahasiswa 2',
            'Judul',
            'Dosen Penyeleksi 1',
            'Dosen Penyeleksi 2',
            'Dosen Penyeleksi 3',
            'File Upload Name',
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
