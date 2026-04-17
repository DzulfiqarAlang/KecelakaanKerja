<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function kecelakaanKerja()
    {
        return $this->belongsTo(KecelakaanKerja::class);
    }
}
