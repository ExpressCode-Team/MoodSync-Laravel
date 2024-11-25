<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'spotify_id' => 'admin1', 
                'name' => 'Fathur',
                'images' => null,
                'email' => 'fathur@example.com',
                'external_urls' => null,
                'password' => Hash::make('password123'),
                'followers' => 1,
                'role' => 1,
                'country' => 'ID',
                'product' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, 
            ],
            [
                'spotify_id' => 'admin2', 
                'name' => 'Ageng',
                'images' => null,
                'email' => 'ageng@example.com',
                'external_urls' => null,
                'password' => Hash::make('password123'),
                'followers' => 10,
                'role' => 1,
                'country' => 'ID',
                'product' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'spotify_id' => 'admin3', 
                'name' => 'Cindy',
                'images' => null,
                'email' => 'cindy@example.com',
                'external_urls' => null,
                'password' => Hash::make('password123'),
                'followers' => 20,
                'role' => 1,
                'country' => 'ID',
                'product' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'spotify_id' => 'admin4', 
                'name' => 'Raihan',
                'images' => null,
                'email' => 'raihan@example.com',
                'external_urls' => null,
                'password' => Hash::make('password123'),
                'followers' => 40,
                'role' => 1,
                'country' => 'ID',
                'product' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'spotify_id' => '3143xwnhwb76gj3fxoeulokq4gum', 
                'name' => 'User Ex',
                'images' => 'https://example.com/image4.jpg',
                'email' => 'userex@example.com',
                'external_urls' => 'https://open.spotify.com/user/3143xwnhwb76gj3fxoeulokq4gum',
                'followers' => 10,
                'password' => null,
                'role' => 0,
                'country' => 'ID',
                'product' => 'free',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, 
            ],
        ]);
    }
}