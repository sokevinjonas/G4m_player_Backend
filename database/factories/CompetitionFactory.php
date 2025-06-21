<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'game_id' => Game::inRandomOrder()->first()?->id ?? Game::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'is_online' => $this->faker->boolean,
            'reward' => $this->faker->optional()->word,
            'status' => $this->faker->randomElement(['upcoming', 'ongoing', 'completed', 'cancel']),
            'contact_link' => json_encode([
                'discord' => $this->faker->url,
                'telegram' => $this->faker->url,
            ]),
        ];
    }
}
