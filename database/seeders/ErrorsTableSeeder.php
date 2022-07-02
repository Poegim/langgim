<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ErrorsTableSeeder extends Seeder
{
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
            for ($i=0; $i < 10; $i++) {

                DB::table('errors')->insert(
                    [
                        'user_id' => 1,
                        'word_id' => rand(1,300),
                        'title' => $this->faker->word(),
                        'description' => $this->faker->realText($maxNbChars = 200),
                        'status' => rand(0,1),
                    ]
                );
            }

        }
    }
}
