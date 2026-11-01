<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@perpus.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas@perpus.test'],
            [
                'name' => 'Petugas',
                'password' => Hash::make('password'),
                'role' => 'petugas'
            ]
        );

        foreach (['Fiksi', 'Sains', 'Teknologi', 'Sejarah'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
