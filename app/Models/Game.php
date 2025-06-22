<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\TypesGame;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'logo', 'description', 'type_game_id', 'contact_link',
    ];

    public function players()
    {
        return $this->belongsToMany(User::class, 'user_games')
            ->withPivot('total_points')
            ->withTimestamps();
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function typeGame()
    {
        return $this->belongsTo(TypesGame::class, 'type_game_id');
    }
}
