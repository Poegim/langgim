<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Pomieszczenia',
            'parent_id' => null,
        ]);

        Category::create([
            'name' => 'Przedmioty',
            'parent_id' => null,
        ]);

        Category::create([
            'name' => 'Przedmioty w domu',
            'parent_id' => 2,
        ]);
    }
}
