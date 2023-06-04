<?php

namespace Database\Seeders;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->take(2)->each(fn ($user) => Messages::factory()->count(20)->create(
            [
                'from_id' => $user->id,
                'to_id' => User::all()->random()->id,
            ]
        ));
    }
}
