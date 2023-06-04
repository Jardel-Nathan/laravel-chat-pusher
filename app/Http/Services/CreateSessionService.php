<?php

namespace App\Http\Services;

use App\Models\User;

class CreateSessionService
{

    static function process(User $user)
    {
        auth()->login($user);
    }
}
