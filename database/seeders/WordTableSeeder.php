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
                'sample_sentence' => 'Cześć, co u ciebie?',
                'category_id' => 1,
            ],
            [
                'pl_word' => 'dziękuje',
                'sample_sentence' => 'Dziękuje za pomoc.',
                'category_id' => 1,
            ]
        ]);
    }
}
