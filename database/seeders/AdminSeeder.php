<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Reno',
            'email' => 'reno@admin.com', // Username Anda
            'password' => Hash::make('admin123'), // Password Anda
        ]);

        User::create([
            'name' => 'Iqbal',
            'email' => 'iqbal@staff.com', // Username Anda
            'password' => Hash::make('staff123'), // Password Anda
        ]);
    }
}