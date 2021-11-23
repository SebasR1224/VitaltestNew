<?php

namespace App\Http\Livewire;

use App\Models\Medicamento;
use Livewire\Component;

class ShowMedicines extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.show-medicines', [
            'list' => Medicamento::where('nombreMedicamento', 'LIKE', "%{$this->search}%")->get(),
        ]);
    }
}
