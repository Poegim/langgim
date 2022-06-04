<?php

namespace Database\Seeders;

use App\Models\UaWord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UaWordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UaWord::insert([
            [
                'id' => 1,
                'word' => 'привіт',
            ],
            [
                'id' => 2,
                'word' => 'дякую',
            ]
        ]);
    }
}
