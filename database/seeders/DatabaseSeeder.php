<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\WordTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CategoryTableSeeder;
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
        $this->call(CategoryTableSeeder::class);
        $this->call(WordTableSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
