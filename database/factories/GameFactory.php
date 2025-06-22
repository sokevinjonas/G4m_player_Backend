<?php

namespace Database\Factories;

use App\Models\TypesGame;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_game_id' => TypesGame::inRandomOrder()->first()?->id ?? TypesGame::factory(),
            'name' => $this->faker->unique()->company,
            'logo' => $this->faker->imageUrl(200, 200, 'games', true, 'Game Logo'),
            'description' => $this->faker->paragraph,
            'contact_link' => json_encode([
                ['type' => 'discord', 'url' => $this->faker->url],
                ['type' => 'telegram', 'url' => $this->faker->url],
            ]),
        ];
    }
}
