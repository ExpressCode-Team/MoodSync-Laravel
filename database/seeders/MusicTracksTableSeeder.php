<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MusicTracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Dreaming Awake',
            'Lost in Time',
            'Wanderlust',
            'Echoes of You',
            'City Lights',
            'Sunset Boulevard',
            'Rainy Moods',
            'Reflections',
            'Beyond the Horizon',
            'Silent Whisper',
            'Electric Heartbeat',
            'Waves of Tranquility',
            'Golden Skies',
            'Under the Stars',
            'Eternal Flame',
            'Midnight Drive',
            'Falling Leaves',
            'Through the Mist',
            'Aurora',
            'Endless Roads'
        ];

        $artists = [
            'The Wanderers',
            'Sunset Crew',
            'Electric Soul',
            'Oceanic Vibes',
            'The Echoes',
            'Dream Chasers',
            'Nightfall',
            'Mystic Sound',
            'Skyline',
            'City Beats',
            'Soul Seekers',
            'Tranquil Waves',
            'Golden Aura',
            'Star Gaze',
            'Flame Hearts',
            'Midnight Riders',
            'Nature’s Call',
            'Foggy Morning',
            'Northern Lights',
            'Infinite Journey'
        ];

        $albums = [
            'Wanderlust',
            'City Escape',
            'Electric Dreams',
            'Ocean Breeze',
            'Echoes of Silence',
            'Dreamers Paradise',
            'After Dark',
            'Mystic Journey',
            'Sky High',
            'Urban Beat',
            'Soul Symphony',
            'Peaceful Shores',
            'Golden Hour',
            'Starlight',
            'Burning Passion',
            'Nocturnal',
            'Fall Reflections',
            'Ethereal Mist',
            'Arctic Dreams',
            'Journey’s End'
        ];

        $genres = ['Pop', 'Rock', 'Jazz', 'Classical', 'Hip-Hop'];

        // Insert 20 data dummy
        for ($i = 0; $i < 20; $i++) {
            DB::table('music_tracks')->insert([
                'title' => $titles[$i],
                'artist' => $artists[$i],
                'album' => $albums[$i],
                'genre' => $genres[array_rand($genres)],
                'url' => 'https://example.com/track' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
