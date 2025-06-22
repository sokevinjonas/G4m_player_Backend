<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypesGame;

class TypesGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Action', 'Stratégie', 'Sport', 'RPG', 'Puzzle'];
        foreach ($types as $type) {
            TypesGame::firstOrCreate(['name' => $type]);
        }
    }
}
