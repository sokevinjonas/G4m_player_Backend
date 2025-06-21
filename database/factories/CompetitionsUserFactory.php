<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompetitionsUser>
 */
class CompetitionsUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'competition_id' => Competition::inRandomOrder()->first()?->id ?? Competition::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'points' => $this->faker->numberBetween(0, 100),
        ];
    }
}
