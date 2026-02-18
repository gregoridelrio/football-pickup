<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'pepito',
            'email' => 'pepito@test.com',
            'password' => Hash::make('password'),
            'phone' => '666777888',
            'skill_level' => 'intermediate',
            'favourite_position' => 'midfielder',
        ]);

        User::create([
            'name' => 'juanito',
            'email' => 'juanito@test.com',
            'password' => Hash::make('password'),
            'phone' => '611222333',
            'skill_level' => 'advanced',
            'favourite_position' => 'striker',
        ]);

        User::create([
            'name' => 'mario',
            'email' => 'mario@test.com',
            'password' => Hash::make('password'),
            'phone' => '622333444',
            'skill_level' => 'beginner',
            'favourite_position' => 'defender',
        ]);
    }
}
