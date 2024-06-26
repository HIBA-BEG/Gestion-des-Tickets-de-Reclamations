<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'ticket_id' => Ticket::factory(),
        ];
    }
}
