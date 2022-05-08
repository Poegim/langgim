<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Word::insert([
            [
            'pl_word' => 'cześć',
            'ua_word' => 'привіт',
            'category_id' => 1,
        ],
        [
            'pl_word' => 'dziękuje',
            'ua_word' => 'дякую',
            'category_id' => 1,
        ]
    ]);
    }
}
