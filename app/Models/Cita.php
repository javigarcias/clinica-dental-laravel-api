<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function clientes()
    {
        return $this->belongsTo('App\Models\Cliente','cliente_id');
    }

    public function dentistas()
    {
        return $this->belongsTo('App\Models\Dentista','dentista_id');
    }
}
