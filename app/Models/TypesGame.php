<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypesGame extends Model
{
    use HasFactory;
    
    protected $table = 'types_games';

    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'type_game_id');
    }
}
