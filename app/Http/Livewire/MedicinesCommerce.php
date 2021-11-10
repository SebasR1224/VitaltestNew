<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use Livewire\Component;

class MedicinesCommerce extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.medicines-commerce',
        [
            'laboratories' => Laboratorio::orderBy('id', 'DESC')->pluck('nombreLaboratorio' , 'id'),
            'categories' => Categoria::orderBy('id', 'DESC')->pluck('nombreCategoria' , 'id'),
            'medicamentos' => Medicamento::where('nombreMedicamento', 'LIKE', "%{$this->search}%")
            ->paginate(50)
        ])->extends('layouts.main', ['activePage' =>'users'])->section('content');
    }
}
