<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
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
            'name' => $this->faker->name,
            'category_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->randomElement([
                'C1.jpg',
                'C2.jpg',
                'C3.jpg',
                'D1.jpg',
                'D2.jpg',
                'D3.jpg',
                'D4.jpg',
                'D5.jpg',
                'D6.jpg',
                'D7.jpg',
                'D8.jpg',
                'D9.jpg',
                'D10.jpg',
            ]),
        ];
    }
}
