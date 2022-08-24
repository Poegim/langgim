<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Ge_wordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') == 'local')
        {
            for ($i=0; $i < 150; $i++) {

                DB::table('ge_words')->insert(
                    [
                        'id' => $i+1,
                        'word' => 'geword'.$i+1,
                    ]
                );
            }

        }
    }
}
