<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([

            // ======================
            // ADMIN
            // ======================
            [
                'name' => 'Admin Satu',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password123'),
                'no_telp' => '081234567801',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Dua',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password123'),
                'no_telp' => '081234567802',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ======================
            // KASIR
            // ======================
            [
                'name' => 'Kasir Satu',
                'email' => 'kasir1@gmail.com',
                'password' => Hash::make('password123'),
                'no_telp' => '081234567803',
                'role' => 'kasir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kasir Dua',
                'email' => 'kasir2@gmail.com',
                'password' => Hash::make('password123'),
                'no_telp' => '081234567804',
                'role' => 'kasir',
                'created_at' => now(),
                'updated_at' => now(),
            ],

     
        ]);
    }
}
