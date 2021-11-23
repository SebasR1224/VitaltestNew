<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use Livewire\Component;

class MedicinesCommerceCategory extends Component
{
    public $search;


    public $category;

    public function mount(Categoria $category)
    {
        $this->category = $category->id;
    }

    public function render()
    {
        return view('livewire.medicines-commerce-category', [
            'laboratories' => Laboratorio::all()->sortByDesc("id"),
            'categories' => Categoria::all()->sortByDesc("id"),
            'medicamentos' => Medicamento::where('status', '!=', '0')->where('categoria_id', $this->category)
            ->Where('nombreMedicamento', 'LIKE', "%{$this->search}%")
            ->orderBy('descuento', 'desc')
            ->paginate(4)
        ])->extends('layouts.main', ['activePage' =>'commerce'])->section('content');
    }
}
