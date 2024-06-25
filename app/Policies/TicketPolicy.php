<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ticket;

class TicketPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function assign(User $user, Ticket $ticket)
    {
        return $user->role === 'Responsable';
    }
}
