<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ParteCuerpo extends Model
{

    //Relacion uno a muchos inversa

    public function recomendaciones(){
        return $this->hasMany(Recomendacion::class);
    }
}
