<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => $this->faker->country(),
            'state' => $this->faker->city(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
        ];
    }
}
