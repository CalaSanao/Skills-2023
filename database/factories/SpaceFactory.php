<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class SpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description_es' => fake()->text(),
            'description_cat' => fake()->text(),
            'description_en' => fake()->text(),
            'start_date' => fake()->time(),
            'end_date' => fake()->time(),
            'accessibility' => fake()->randomElement(['small','medium','high']),
            'zone' => fake()->word(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'construction_year' => fake()->year(),
            'is_featured' => fake()->boolean(),
            'type_id' => fake()->numberBetween(1,10),
            'city_id' => fake()->numberBetween(1,10),
        ];
    }
}
