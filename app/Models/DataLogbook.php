<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLogbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'dospem1',
        'qrcode_dospem1',
        'dospem2',
        'qrcode_dospem2',
        'user_id'
    ];

    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
