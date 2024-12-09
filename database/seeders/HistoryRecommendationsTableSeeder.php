<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoryRecommendation;
use App\Models\User;

class HistoryRecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $users = User::factory()->count(5)->create();
        }

        // Data rekomendasi yang tetap
        $recommendations = [
            [
                'type' => 'song',
                'recommendation_id' => '4hDok0OAJd57SGIT8xuWJH',
            ],
            [
                'type' => 'playlist',
                'recommendation_id' => '3cEYpjA9oz9GiPac4AsH4n',
            ],
            [
                'type' => 'song',
                'recommendation_id' => '2xTft6GEUhrVKJFrlUNoA9',
            ],
            [
                'type' => 'playlist',
                'recommendation_id' => '1t2xT7fGEUhrVKJFrlUNoB9',
            ],
        ];

        // Assign rekomendasi ke pengguna secara berulang
        foreach ($users as $user) {
            foreach ($recommendations as $recommendation) {
                HistoryRecommendation::create([
                    'id_user' => $user->id,
                    'type' => $recommendation['type'],
                    'recommendation_id' => $recommendation['recommendation_id'],
                ]);
            }
        }
    }
}
