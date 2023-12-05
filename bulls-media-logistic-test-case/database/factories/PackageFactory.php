<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'width' => $this->faker->randomFloat(2, 1, 100),
            'height' => $this->faker->randomFloat(2, 1, 100),
            'length' => $this->faker->randomFloat(2, 1, 100),
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'type' => $this->faker->word,
            'description' => $this->faker->sentence,
            'width_unit' => $this->faker->randomElement(['cm', 'in', 'm']),
            'height_unit' => $this->faker->randomElement(['cm', 'in', 'm']),
            'length_unit' => $this->faker->randomElement(['cm', 'in', 'm']),
            'weight_unit' => $this->faker->randomElement(['kg', 'lb']),
        ];
    }
}
