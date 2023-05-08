<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterestPoint>
 */
class InterestPointFactory extends Factory
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
            'description_es' => fake()->text(),
            'description_cat' => fake()->text(),
            'description_en' => fake()->text(),
            'audio_es' => fake()->url(),
            'audio_cat' => fake()->url(),
            'audio_en' => fake()->url(),
            'image_id' => fake()->numberBetween(1,10)
        ];
    }
}
