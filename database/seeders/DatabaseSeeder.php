<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BadgeSeeder;
use Database\Seeders\TypesGameSeeder;
use Database\Seeders\UsersGameSeeder;
use Database\Seeders\UsersBadgeSeeder;
use Database\Seeders\CompetitionSeeder;
use Database\Seeders\CompetitionsUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TypesGameSeeder::class,
            GameSeeder::class,
            CompetitionSeeder::class,
            BadgeSeeder::class,
            UsersGameSeeder::class,
            CompetitionsUserSeeder::class,
            UsersBadgeSeeder::class,
        ]);
    }
}
