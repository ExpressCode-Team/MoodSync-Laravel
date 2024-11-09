<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emotions')->insert([
            ['name' => 'angry', 'kode_emotion' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'happy', 'kode_emotion' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'neutral', 'kode_emotion' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sad', 'kode_emotion' => '3', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
