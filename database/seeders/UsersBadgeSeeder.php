<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsersBadge;

class UsersBadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersBadge::factory()->count(10)->create();
    }
}
