<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@perpus.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@perpus.test',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);

        foreach (['Fiksi', 'Sains', 'Teknologi', 'Sejarah'] as $name) {
            Category::create(['name' => $name]);
        }
    }
}