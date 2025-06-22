<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UsersGameSeeder;
use Database\Seeders\CompetitionSeeder;
use Database\Seeders\CompetitionsUserSeeder;
use Database\Seeders\BadgeSeeder;
use Database\Seeders\UsersBadgeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            // GameSeeder::class,
            // CompetitionSeeder::class,
            // CompetitionsUserSeeder::class,
            // UsersGameSeeder::class,
            // BadgeSeeder::class,
            // UsersBadgeSeeder::class,
        ]);
    }
}
