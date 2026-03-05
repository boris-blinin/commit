<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Каска защитная',
                'Перчатки рабочие',
                'Ботинки спец',
                'Куртка утепленная'
            ]),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'life_months' => $this->faker->numberBetween(3, 24),
        ];
    }
}
