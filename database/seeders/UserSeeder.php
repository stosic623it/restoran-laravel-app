<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@restaurant.test',
            'password' => 'pass12345',
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@restaurant.test',
            'password' => Hash::make('password'),
        ]);
    }
}
