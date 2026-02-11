<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        // Akun Siswa
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'role' => 'siswa',
            'password' => Hash::make('password123'),
        ]);
    }
}
