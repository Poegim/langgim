<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Ua_wordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create('ua_UA');

        // if(env('APP_ENV') == 'local')
        // {
        //     for ($i=0; $i < 150; $i++) {

        //         DB::table('ua_words')->insert(
        //             [
        //                 'id' => $i+1,
        //                 'word' => $this->faker->word(),
        //             ]
        //         );
        //     }

        // }

        DB::table('ua_words')->insert(
            [
                'id' => 1,
                'word' => 'osa',
            ]
        );

        DB::table('ua_words')->insert(
            [
                'id' => 2,
                'word' => 'ala',
            ]
        );
    }
}
