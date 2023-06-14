<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;

class ChatList extends Component
{

    public function mount()
    {
        $this->conversations = Conversation::with('user')->get();
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
