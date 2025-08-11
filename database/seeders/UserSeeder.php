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
            'id' => 'FM001',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '0701234589',
            'usertype' => 'user',
            'password' => Hash::make('password'), // always hash passwords
        ]);
    }
}
