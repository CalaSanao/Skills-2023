<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => fake()->text(),
            'valoration' => fake()->numberBetween(1,5),
            'is_validated' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1,10),
            'space_id' => fake()->numberBetween(1,10),
        ];
    }
}
