<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketCategory>
 */
class TicketCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->unique(reset:true)->randomElement(['Regular', 'Special', 'VIP', 'VIP+']),
            'price'=>fake()->randomFloat(2,50000,1000000),
            'stock'=>fake()->numberBetween(1,250)
        ];
    }
}
