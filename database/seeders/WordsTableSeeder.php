<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
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

        if(env('APP_ENV') == 'local')
        {
            $this->faker = Factory::create();
            $categories = Category::all();
            foreach ($categories as $category)
            {
                foreach($category->subcategories as $subcategory)
                {
                    for ($i=0; $i < 6; $i++) {
                        DB::table('words')->insert(
                            [
                                'polish' => 'word'.$category->id.$subcategory->id.$i+1,
                                'ukrainian' => 'uaword'.$category->id.$subcategory->id.$i+1,
                                'english' => 'enword'.$category->id.$subcategory->id.$i+1,
                                'german' => 'deword'.$category->id.$subcategory->id.$i+1,
                                'spanish' => 'esword'.$category->id.$subcategory->id.$i+1,
                                'sample_sentence' => $this->faker->realText(25),
                                'category_id' => $category->id,
                                'subcategory_id' => $subcategory->id,
                                'level' => rand(1,3),
                            ]
                        );
                    }
                }
            }
        }

    }

}
