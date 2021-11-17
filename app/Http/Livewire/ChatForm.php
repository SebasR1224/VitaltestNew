<?php

namespace App\Http\Livewire;
use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class ChatForm extends Component
{
    public $username;
    public $message;
    public $fecha;

    public function mount()
    {
        $this ->username = auth()->id();
        $this->message = "";
        $this->fecha = Carbon::now()->isoFormat('H:mm A');
    }


    public function sendMessage()
    {
        $this->validate([
            'message' => 'required'
        ]);

        Chat::create([
            'user_id' => $this->username,
            'message' => $this->message
        ]);

        $this->emit('sendMessage');
        $datos = [
            'username' => $this->username,
            'message' => $this->message
        ];

        // $this->emit('getMessage', $datos);

       event(new \App\Events\SendMessage($this->username, $this->message));
    }

    public function render()
    {
        return view('livewire.chat-form');
    }
}
