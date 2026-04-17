<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecelakaanKerja extends Model
{
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    protected $guarded = [];
}
