<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Seeder
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ganti 'password' dengan password yang aman
            'phone_number' => '081234567890',
            'level' => 'admin',
        ]);

        // Petugas Seeder
        User::create([
            'name' => 'Petugas Satu',
            'username' => 'petugas1',
            'email' => 'petugas1@example.com',
            'password' => Hash::make('password'), // ganti 'password' dengan password yang aman
            'phone_number' => '089876543210',
            'level' => 'petugas',
        ]);
    }
}
