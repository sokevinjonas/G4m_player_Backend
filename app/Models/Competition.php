<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function players()
    {
        return $this->belongsToMany(User::class, 'competitions_users')
            ->withTimestamps();
    }

}
