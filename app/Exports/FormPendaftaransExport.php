<?php

namespace App\Exports;

use App\Models\FormPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormPendaftaransExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormPendaftaran::all();
    }
}
