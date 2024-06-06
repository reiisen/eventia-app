<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(4),
            'description' => fake()->paragraph(4),
            'image_url' => 'https://cdn.discordapp.com/attachments/1189955120650256534/1245372737724219502/2339170.jpg?ex=6658833e&is=665731be&hm=ab844c02e1b3f2591a247ea85a05703647f15c2f8a717ab300898c82cbf7b85d&',
            'status' => fake()->randomElement(['available']),
            'date' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
