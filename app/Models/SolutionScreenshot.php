<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionScreenshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'solution_id',
        'file_path',
    ];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}