<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Badge>
 */
class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades = [
            'Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond',
            'Crown', 'Ace', 'Ace Master', 'Ace Dominator', 'Conqueror'
        ];
        return [
            'name' => $this->faker->unique()->word,
            'icon' => $this->faker->imageUrl(100, 100, 'badges', true, 'Badge Icon'),
            'description' => $this->faker->sentence,
            'grade' => $this->faker->unique()->randomElement($grades),
            'is_active' => $this->faker->boolean(90),
            'required_points' => $this->faker->numberBetween(0, 1000),
            'required_wins' => $this->faker->numberBetween(0, 100),
            'required_participations' => $this->faker->numberBetween(0, 50),
            'required_top3' => $this->faker->numberBetween(0, 20),
        ];
    }
}
