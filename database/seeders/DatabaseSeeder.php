<?php

namespace Database\Seeders;

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
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@example.com',
            'phone' => '+38 (050) 123-45-67',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Create default user
        User::factory()->create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'user@example.com',
            'phone' => '+38 (050) 987-65-43',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
