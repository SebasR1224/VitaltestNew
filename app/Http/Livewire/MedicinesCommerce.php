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
            'laboratories' => Laboratorio::all()->sortByDesc("id"),
            'categories' => Categoria::all()->sortByDesc("id"),
            'medicamentos' => Medicamento::where('precioDescuento', '!=', '')
            ->where('nombreMedicamento', 'LIKE', "%{$this->search}%")
            ->orderBy('descuento', 'desc')
            ->paginate(4)
        ])->extends('layouts.main', ['activePage' =>'commerce'])
        ->section('content');
    }
}
