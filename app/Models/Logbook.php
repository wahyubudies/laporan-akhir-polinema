<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'narasi',
        'data_logbook_id'
    ];

    public function DataLogbook()
    {
        return $this->belongsTo(DataLogbook::class);
    }
}
