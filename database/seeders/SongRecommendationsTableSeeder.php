<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongRecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recommendations = [
            [
                'user_id' => 1,
                'song_id' => '4uLU6hMCjMI75M1A2tKUQC',
                'like' => 1,
                'recommendation_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'song_id' => '7ouMYWpwJ422jRcDASZB7P',
                'like' => 0,
                'recommendation_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'song_id' => '1tJw60G9KH2ARoxjrrMZoa',
                'like' => 1,
                'recommendation_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'song_id' => '5T8EDUDqKcs6OSOwEsfqG7',
                'like' => 0,
                'recommendation_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('song_recommendations')->insert($recommendations);
    }
}
