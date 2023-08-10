<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
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
                    for ($i=0; $i < 2; $i++) {
                        DB::table('words')->insert(
                            [
                                'pl_word' => 'word'.$category->id.$subcategory->id.$i+1,
                                'sample_sentence' => $this->faker->realText(25),
                                'category_id' => $category->id,
                                'subcategory_id' => $subcategory->id,
                            ]
                        );
                    }
                }
            }
        }

    }

}
