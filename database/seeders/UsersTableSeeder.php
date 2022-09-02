<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 1,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Admin2',
            'email' => 'admin2@example.com',
            'role' => 1,
            'password' => bcrypt('password'),
        ]);


    }
}
