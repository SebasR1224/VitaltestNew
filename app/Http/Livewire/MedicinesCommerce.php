<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MedicinesCommerce extends Component
{
    public $search;
    public function render()
    {
        abort_if(Gate::denies('oferta_index'), 403);
        return view('livewire.medicines-commerce',
        [
            'laboratories' => Laboratorio::all()->sortByDesc("id"),
            'categories' => Categoria::all()->sortByDesc("id"),
            'medicamentos' => Medicamento::where('status', '!=', '0')->where('precioDescuento', '!=', '')
            ->where('nombreMedicamento', 'LIKE', "%{$this->search}%")
            ->orderBy('descuento', 'desc')
            ->paginate(50)
        ])->extends('layouts.main', ['activePage' =>'commerce'])
        ->section('content');
    }
}
