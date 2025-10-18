<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => 'https://picsum.photos/seed' . $this->faker->unique()->word() . '/640/480',
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(10)
        ];
    }
}
