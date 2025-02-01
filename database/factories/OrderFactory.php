<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'total' => $this->faker->randomFloat(2, 1, 100),
            'user_id' => 1,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'address_id' => $this->faker->numberBetween(1, 10),
            'shipping_service'=> $this->faker->randomElement(['DHL', 'Fedex', 'UPS']),
            'tracking_number'=> $this->faker->randomNumber(8),

        ];
    }
}
