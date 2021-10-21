<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function recomendaciones(){
        return $this->belongsToMany(Recomendacion::class, 'medicamento_recomendacion');
    }

    //relacion uno a muchos laboratorio(inversa)

    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }

    //relacion uno a muchos categoria(inversa)
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    protected $guarded = [];
}
