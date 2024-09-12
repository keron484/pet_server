<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
              // Sample admin user data
              $adminUsers = [
                [
                    'username' => 'admin1',
                    'email' => 'admin1@example.com',
                    'password' => Hash::make('password123$'), // Make sure to hash the password
                    'profile_picture' => null, // Update with the correct path
                ],
                [
                    'username' => 'admin2',
                    'email' => 'admin2@example.com',
                    'password' => Hash::make('password123$'), // Use a securely hashed password
                    'profile_picture' => null, // Update with the correct path
                ],
                [
                    'username' => 'superadmin',
                    'email' => 'superadmin@example.com',
                    'password' => Hash::make('supersecurepassword$'), // Use a securely hashed password
                    'profile_picture' => null // Update with the correct path
                ],
            ];
    
            // Insert sample data
            foreach ($adminUsers as $adminUser) {
                Admin::create($adminUser);
            }
    }
}
