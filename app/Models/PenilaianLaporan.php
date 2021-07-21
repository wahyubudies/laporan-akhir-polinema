<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianLaporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'dosen_pembimbing_1',
        'dosen_pembimbing_2',
        'nilai_dospem_1',
        'nilai_dospem_2',
        'dosen_penguji_1',
        'dosen_penguji_2',
        'nilai_dospeng_1',
        'nilai_dospeng_2',
    ];
}