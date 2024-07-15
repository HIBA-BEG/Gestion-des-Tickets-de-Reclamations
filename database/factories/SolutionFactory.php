<?php

namespace Database\Factories;

use App\Models\Solution;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    protected $model = Solution::class;

    public function definition()
    {
        return [
            'solution' => $this->faker->paragraph,
            'ticket_id' => Ticket::factory(),
        ];
    }
}
