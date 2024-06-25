<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'etat',
        'impact',
        'priorite',
        'systeme',
        'reproductibilite',
        'categorie',
        'user_id',
        'tracking_code',
        'guest_name',
        'guest_email',
        'assigned_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function solution()
    {
        return $this->hasOne(Solution::class);
    }
    public function screenshots()
    {
        return $this->hasMany(TicketScreenshot::class);
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
