<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // toujours hasher !
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'member',
            'email' => 'member@example.com',
            'password' => Hash::make('member'),
            'role' => 'member',
        ]);
    }
}
