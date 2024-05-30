<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $environment = env('APP_ENV');
        if ($environment !== 'production') {
            // Production environment
            // Create an admin user
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => 123,
                'role' => 'admin', // Assign admin role
            ]);
        }

        User::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'user', // Assign admin role
        ]);
    }
}
