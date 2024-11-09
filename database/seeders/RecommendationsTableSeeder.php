<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID dari tabel yang terkait
        $userIds = DB::table('users')->pluck('id')->toArray();
        $emotionIds = DB::table('emotions')->pluck('id')->toArray();
        $musicTrackIds = DB::table('music_tracks')->pluck('id')->toArray();

        // Insert 10 data dummy
        for ($i = 0; $i < 10; $i++) {
            DB::table('recommendations')->insert([
                'user_id' => $userIds[array_rand($userIds)],
                'emotion_id' => $emotionIds[array_rand($emotionIds)],
                'music_track_id' => $musicTrackIds[array_rand($musicTrackIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
