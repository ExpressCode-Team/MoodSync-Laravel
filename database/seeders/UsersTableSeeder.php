<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Cindy Vira',
                'email' => 'cindy@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cyndu Fathur',
                'email' => 'fathur@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Raihan Fazaufa',
                'email' => 'raihan@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stefanus Ageng',
                'email' => 'ageng@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user random',
                'email' => 'user1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
