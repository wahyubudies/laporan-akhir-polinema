<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim_mhs_1',
        'nama_mhs_1',
        'nim_mhs_2',
        'nama_mhs_2',
        'judul',
        'dosen_penyeleksi_1',
        'dosen_penyeleksi_2',
        'dosen_penyeleksi_3',
        'file_upload'
    ];
}
