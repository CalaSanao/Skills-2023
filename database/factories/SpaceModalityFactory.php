<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpaceModality>
 */
class SpaceModalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'space_id' => fake()->numberBetween(1,10),
            'modality_id' => fake()->numberBetween(1,10)
        ];
    }
}
