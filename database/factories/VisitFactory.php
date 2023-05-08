<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime(),
            'num_places' => fake()->numberBetween(5,30),
            'is_incription_needed' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1,10),
            'space_id' => fake()->numberBetween(1,10),
            'interest_point_id' => fake()->numberBetween(1,10)
        ];
    }
}
