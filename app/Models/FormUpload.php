<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim_mhs_1',        
        'nama_mhs_1',            
        'nim_mhs_2',            
        'nama_mhs_2',            
        'judul',            
        'dosen_pmb_1',            
        'dosen_pmb_2',            
        'dosen_pgj_1',            
        'dosen_pgj_2',            
        'file_upload'      
    ];
}
