<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.show-users', [
            'users' => User::where('username',  'LIKE', "%{$this->search}%")->get()
        ]);
    }
}
