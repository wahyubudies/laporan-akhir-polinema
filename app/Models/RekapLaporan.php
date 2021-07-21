<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapLaporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'dosen_pembimbing_1',
        'dosen_pembimbing_2',
        'link_drive',
    ];

}
