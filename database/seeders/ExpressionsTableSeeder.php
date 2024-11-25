<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpressionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expressions = [
            ['expression_id' => 0, 'expression_name' => 'angry', 'created_at' => now(), 'updated_at' => now()],
            ['expression_id' => 1, 'expression_name' => 'happy', 'created_at' => now(), 'updated_at' => now()],
            ['expression_id' => 2, 'expression_name' => 'neutral', 'created_at' => now(), 'updated_at' => now()],
            ['expression_id' => 3, 'expression_name' => 'sad', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('expressions')->insert($expressions);
    }
}
