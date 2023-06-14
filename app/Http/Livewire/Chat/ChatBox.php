<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Message;

class ChatBox extends Component
{
    public $conversationId;
    public $messages;
    public function mount()
{
    // Asigna el valor a $conversationId
    $this->conversationId = 1; // Ejemplo: 1 es el ID de la conversación
}
    public function render()
    {
        $this->messages = Message::where('conversation_id', $this->conversationId)->get();
        return view('livewire.chat.chat-box');
    }
}
