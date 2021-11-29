<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    //relacion muchos a muchos
    public function recomendaciones(){
        return $this->belongsToMany(Recomendacion::class);
    }
}
