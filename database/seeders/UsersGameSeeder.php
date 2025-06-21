<?php

namespace Database\Seeders;

use App\Models\UsersGame;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersGame::factory()->count(50)->create();
    }
}
