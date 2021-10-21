<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function recomendaciones(){
        return $this->belongsToMany(Recomendacion::class);
    }
}
