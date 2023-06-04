<?php

namespace App\Http\Livewire\Chat;

use App\Http\Requests\CreateAccountRequest;
use Livewire\Component;
use App\Http\Services\CreateAccountService;
use App\Http\Services\CreateSessionService;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class CreateAccount extends Component
{
 
    public User $user;
    public $name;

    protected array $rules = [
        'name' => [
            'required',
            'string',
            'min:3',
            'max:255',
        ],
    ];

    public function render()
    {
        return view('livewire.chat.create-account');
    }


    public function createAccount()
    {
        $this->validate();
        $createAccountService = new CreateAccountService();
        $this->user = $createAccountService->process($this->name);
        CreateSessionService::process($this->user);
        return true;
    }



}
