<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompetitionsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompetitionsUser::factory()->count(50)->create();
    
    }
}
