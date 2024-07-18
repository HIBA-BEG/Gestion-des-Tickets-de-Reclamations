<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'archived',
        'assigned_systems',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'assigned_systems' => 'array',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $systemsByRole = [
                'Niv 1' => ['SQCA', 'BDT', 'SIGC'],
                'Niv 2' => ['SGIA', 'Docflow', 'INSAF', 'OBTP'],
                'Utilisateur standard' => ['Ma Route'],
                'Responsable' => ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP'],
            ];

            $user->assigned_systems = $systemsByRole[$user->role] ?? [];
        });
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
