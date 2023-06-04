<?php

namespace App\Http\Services;

use App\Models\User;

class CreateAccountService
{
    
    public function process(string $name): User
    {   

        $user = User::create([
            'name' => $name,
        ]);

        $user->save();

        return $user;

    }


}