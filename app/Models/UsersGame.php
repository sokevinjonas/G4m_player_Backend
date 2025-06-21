<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersGame extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'game_id', 'total_points',
    ];
    public $timestamps = true;
    protected $casts = [
        'user_id' => 'integer',
        'game_id' => 'integer',
        'total_points' => 'integer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function scopeWithTotalPoints($query)
    {
        return $query->select('users_games.*', 'users_games.total_points as total_points');
    }
}
