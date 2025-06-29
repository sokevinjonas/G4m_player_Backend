<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'role' => 'admin',
        //     'password' => bcrypt('admin1234'),
        // ]);

        // Gameurs
        User::factory()->create([
            'name' => 'Gameur1',
            'email' => 'gameur1@example.com',
            'role' => 'gameur',
            'password' => bcrypt('gameur1234'),
        ]);

        // 120 gameurs
        // User::factory(12)->create([
        //     'role' => 'gameur',
        //     'password' => bcrypt('gameur1234'),
        // ]);
    }
}
