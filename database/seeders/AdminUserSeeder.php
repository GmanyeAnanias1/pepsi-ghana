<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pepsi.com'], // Unique identifier
            [
                'name' => 'Pepsi Admin ',
                'email' => 'admin@pepsi.com',
                'password' => Hash::make('password'), // Change to a strong password
                'role' => 'admin',
                'phone' => '05555555555',
                'address' => 'Pepsi Headquarters, 123 Cola St, Beverage City',
                'email_verified_at' => now(),
            ]
        );
    }
}
