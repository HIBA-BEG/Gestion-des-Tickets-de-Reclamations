<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Notification;
use App\Models\Solution;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function runn(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $tickets = Ticket::factory(5)->create(['user_id' => $user->id]);

            foreach ($tickets as $ticket) {
                Notification::factory(3)->create(['ticket_id' => $ticket->id]);
                Solution::factory(1)->create(['ticket_id' => $ticket->id]);
            }
        });
    }
}
