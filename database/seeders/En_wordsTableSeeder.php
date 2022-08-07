<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class En_wordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('en_words')->insert(
            [
                'id' => 1,
                'word' => 'enosa',
            ]
        );

        DB::table('en_words')->insert(
            [
                'id' => 2,
                'word' => 'enala',
            ]
        );
    }
}
