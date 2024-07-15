<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'solution',
        'ticket_id',
        'submitted_by'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
    
    public function screenshots()
    {
        return $this->hasMany(SolutionScreenshot::class);
    }
}
