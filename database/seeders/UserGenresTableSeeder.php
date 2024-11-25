<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id' => 1, 'genre_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'genre_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'genre_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 2, 'genre_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'genre_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'genre_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 3, 'genre_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'genre_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'genre_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 4, 'genre_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'genre_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'genre_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 5, 'genre_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'genre_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'genre_id' => 7, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('user_genres')->insert($data);
    }
}
