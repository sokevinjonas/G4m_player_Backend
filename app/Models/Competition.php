<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'game_id', 'title', 'description',
        'date', 'is_online', 'reward', 'status',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function players()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('points')
            ->withTimestamps();
    }
}
