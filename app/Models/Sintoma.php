<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    public function recomendaciones(){
        return $this->hasMany(Recomendacion::class);
    }
}
