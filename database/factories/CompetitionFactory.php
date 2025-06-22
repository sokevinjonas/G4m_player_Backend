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
            'mode' => $this->faker->randomElement(['solo', 'duo', 'squad']),
            'is_online' => $this->faker->boolean,
            'location' => $this->faker->optional()->city,
            'reward' => $this->faker->optional()->word,
            'status' => $this->faker->randomElement(['upcoming', 'ongoing', 'completed', 'cancel']),
            'rules' => json_encode([
                $this->faker->sentence,
                $this->faker->sentence,
            ]),
            'contact_link' => json_encode([
                ['type' => 'discord', 'url' => $this->faker->url],
                ['type' => 'telegram', 'url' => $this->faker->url],
            ]),
        ];
    }
}
