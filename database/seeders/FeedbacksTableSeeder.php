<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID dari tabel recommendations
        $recommendationIds = DB::table('recommendations')->pluck('id')->toArray();

        // Insert 10 data dummy
        for ($i = 0; $i < 5; $i++) {
            DB::table('feedbacks')->insert([
                'recommendation_id' => $recommendationIds[array_rand($recommendationIds)],
                'rating' => rand(1, 5),
                'comment' => null, // Set comment to null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
