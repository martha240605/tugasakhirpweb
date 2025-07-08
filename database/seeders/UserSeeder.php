<?php

namespace Database\Seeders;
use app\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Futsal',
            'email' => 'admin@gmail.com', 
            'password' => Hash::make('password'), 
            'role' => 'admin', 
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
