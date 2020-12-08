<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function dentistas()
    {
        return $this->belongsTo('App\Models\Dentista','dentista_id');
    }
}
