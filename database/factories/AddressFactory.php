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
            //
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'province' => $this->faker->state,
            'district' => $this->faker->city,
            'number' => $this->faker->buildingNumber,
            'postal_code' => $this->faker->postcode,
            //fake user id
            'user_id' => 1,
          

        ];
    }
}
