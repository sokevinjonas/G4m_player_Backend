<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Game;
use App\Models\Badge;
use App\Models\Competition;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'password',
        'role', 'description', 'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relations

    public function games()
    {
        return $this->belongsToMany(Game::class, 'user_games')
            ->withPivot('total_points')
            ->withTimestamps();
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class)
            ->withPivot('points')
            ->withTimestamps();
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class)
            ->withTimestamps();
    }

    // Scope pour récupérer uniquement les gameurs
    public function scopeGameurs($query)
    {
        return $query->where('role', 'gameur');
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
