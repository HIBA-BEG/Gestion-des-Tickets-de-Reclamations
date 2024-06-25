<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketScreenshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'file_path'
    ];

    /**
     * Get the ticket that owns the screenshot.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    public function scopeForTicket($query, $ticketId)
    {
        return $query->where('ticket_id', $ticketId);
    }
}
