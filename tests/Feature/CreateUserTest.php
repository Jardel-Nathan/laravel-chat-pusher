<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCreateUser(): void
    {

        $user = User::factory()->create();
        
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
    }


    public function testeCreateUserWithOnlyName(): void
    {
        $user= new User([
            'name' => 'Teste'
        ]);

        $user->save();

        $this->assertDatabaseHas('users', [
            'name' => 'Teste',
            'email' => null
        ]);
    }

}
