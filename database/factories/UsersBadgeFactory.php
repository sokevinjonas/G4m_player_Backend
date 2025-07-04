<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Badge;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersBadge>
 */
class UsersBadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'badge_id' => Badge::inRandomOrder()->first()?->id ?? Badge::factory(),
        ];
    }
}
