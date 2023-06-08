<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageEvent;
use App\Models\Messages;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Monolog\Logger;

class Chat extends Component
{


    protected $listeners = ['echo-private:messageschat,MessageEvent' => 'messageReceived'];

    public $messages;

    public function render()
    {
    
        // get last 10 messages in desc order
 
        $this->messages = Messages::with(['from', 'to'])->orderBy('id', 'desc')->take(10)->get();
   
        return view('livewire.chat.chat');
    }


    public function messageReceived($data)
    {
        if(\auth()->id() != $data['message']['from_id']){

            $this->emit('refreshComponent');

        }
    }

    public function sendMessage(string $message)
    {
        
        $messageSend = Messages::create([
            'from_id' => auth()->id(),
            'to_id' => User::inRandomOrder()->first()->id,
            'content' => $message,
            'hash_id' => sha1(time())
        ]);

        MessageEvent::dispatch($messageSend);
    }
}
