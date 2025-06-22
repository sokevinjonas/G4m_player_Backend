<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class TypesGame extends Model
{
    protected $table = 'types_games';

    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'type_game_id');
    }
}
