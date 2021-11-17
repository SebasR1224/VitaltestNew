<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $messages;
    protected $lastId;
    public $username;


    protected $listeners = ['getMessage'];

    public function mount()
    {
        $this->lastId = 0;
        $this->messages = [];
        $this ->username = auth()->id();
    }

    public function getMessage($data)
    {
        $this->updateMessages($data);
    }

    public function updateMessages($data)
    {

            // El contenido de la Push
            //$data = \json_decode(\json_encode($data));

            $chats = Chat::orderBy("created_at", "desc")->take(5)->get();
            //$this->mensajes = [];

            foreach($chats as $chat)
            {
                if($this->lastId < $chat->id)
                {
                    $this->lastId = $chat->id;

                    $item = [
                        "id" => $chat->id,
                        "username" => $chat->user_id,
                        "message" => $chat->message,
                        "get" => ($chat->user_id != $this->username),
                        "date" => $chat->created_at->diffForHumans()
                    ];

                    array_unshift($this->messages, $item);
                    //array_push($this->mensajes, $item);
                }

            }
    }


    public function render()
    {
        return view('livewire.chat-list');
    }
}
