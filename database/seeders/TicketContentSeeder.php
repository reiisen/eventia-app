<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Database\Seeder;
use Faker\Factory;

class TicketContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()
            ->count(10)
            ->has(TicketCategory::factory()->count(3), 'categories')
            ->create();
    }
}
