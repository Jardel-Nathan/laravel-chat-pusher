<?php

namespace App\Http\Livewire\Chat;

use App\Models\Messages;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Livewire\Component;

class Chat extends Component
{

    public $messages;

    public function render()
    {
        

        // get last 10 messages in desc order
 
        $this->messages = Messages::with(['from', 'to'])->orderBy('id', 'desc')->take(10)->get();
   
        return view('livewire.chat.chat');
    }


    public function messages()
    {
        
    }

    public function sendMessage(string $message)
    {
        Messages::create([
            'from_id' => auth()->id(),
            'to_id' => User::inRandomOrder()->first()->id,
            'content' => $message,
            'hash_id' => sha1(time())
        ]);

    }
}
