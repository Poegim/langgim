<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Es_wordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(env('APP_ENV') == 'local')
        {
            $words = Word::all();
            foreach($words as $word)
            {
                DB::table('es_words')->insert(
                    [
                        'id' => $word->id,
                        'word' => 'esword'.filter_var($word->pl_word, FILTER_SANITIZE_NUMBER_INT),
                    ]
                );
            }
        }
    }
}
