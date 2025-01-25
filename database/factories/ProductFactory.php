<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(1, 100),
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
            'sub_category_id' => $this->faker->numberBetween(1, 10),
            'category_id' => function (array $attributes) {
                return \App\Models\SubCategory::find($attributes['sub_category_id'])->category_id;
            },
            'is_featured' => $this->faker->boolean,
            'orders' => $this->faker->numberBetween(1, 100),    
        

        ];
    }
}
