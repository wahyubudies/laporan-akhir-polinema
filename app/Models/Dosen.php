<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dosen'
    ];
    public function refrensi_temas()
    {
        return $this->hasMany(RefrensiTema::class);
    }
}
