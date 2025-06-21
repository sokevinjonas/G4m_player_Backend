<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 'logo', 'description',
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
}
