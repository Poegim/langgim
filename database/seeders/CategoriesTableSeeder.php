<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
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
            for ($i=0; $i < 15; $i++) {

                DB::table('categories')->insert(
                    [
                        'name' => $this->faker->word(),
                    ]
                );
            }

        }
    }
}
