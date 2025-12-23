<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user if it doesn't exist
        if (!User::where('username', 'admin')->exists()) {
            User::create([
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        // Create a regular user for testing if it doesn't exist
        if (!User::where('username', 'user')->exists()) {
            User::create([
                'name' => 'Test User',
                'username' => 'user',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }
    }
}
