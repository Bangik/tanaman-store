<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
