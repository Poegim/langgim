<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create();

        // if(env('APP_ENV') == 'local')
        // {
            for ($i=0; $i < 50; $i++) {

                DB::table('subcategories')->insert(
                    [
                        // 'name' => $this->faker->word(),
                        'name' => 'subcategory'.$i+1,
                        'category_id' => rand(1,15),
                    ]
                );
            }

        // }
    }
}
