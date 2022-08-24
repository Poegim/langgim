<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WordsTableSeeder extends Seeder
{

    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create();

        if(env('APP_ENV') == 'local')
        {
            for ($i=0; $i < 150; $i++) {

                DB::table('words')->insert(
                    [
                        'pl_word' => 'word'.$i+1,
                        'sample_sentence' => $this->faker->realText(25),
                        'category_id' => rand(1,15),
                        'subcategory_id' => rand(1,5),
                    ]
                );
            }

        }
    }
}
