<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'word' => 'uaosa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('ua_words')->insert(
            [
                'id' => 2,
                'word' => 'uaala',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
