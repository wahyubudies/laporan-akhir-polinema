<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefrensiTema extends Model
{
    use HasFactory;
    protected $fillable = [
        'tema',
        'dosen_id'
    ];
    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }    
}
