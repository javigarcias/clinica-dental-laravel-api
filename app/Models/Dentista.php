<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function citas()
    {
        return $this->hasMany('App\Models\Cita');
    }

}
