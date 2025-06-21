<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'game_id', 'description', 'contact_link',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
