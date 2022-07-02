<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\WordsTableSeeder;
use Database\Seeders\Ua_wordsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\SubcategoriesTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(WordsTableSeeder::class);
        $this->call(Ua_wordsTableSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
