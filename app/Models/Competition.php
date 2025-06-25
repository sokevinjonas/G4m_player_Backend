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
        'game_id', 'title', 'description', 'date', 'mode', 'max_participants', 
        'current_participants', 'image', 'video', 'is_online', 'location', 
        'reward', 'status', 'rules', 'contact_link',
    ];

    protected $casts = [
        'date' => 'datetime',
        'rules' => 'array',
        'contact_link' => 'array',
        'is_online' => 'boolean',
        'max_participants' => 'integer',
        'current_participants' => 'integer',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function players()
    {
        return $this->belongsToMany(User::class, 'competitions_users')
            ->withTimestamps();
    }

    public function participants()
    {
        return $this->hasMany(CompetitionsUser::class, 'competition_id');
    }

    /**
     * Vérifier si la compétition est pleine
     */
    public function isFull()
    {
        return $this->current_participants >= $this->max_participants;
    }

    /**
     * Vérifier si un utilisateur peut s'inscrire
     */
    public function canUserRegister()
    {
        return !$this->isFull() && in_array($this->status, ['upcoming']);
    }

    /**
     * Obtenir le nombre de places restantes
     */
    public function availableSlots()
    {
        return max(0, $this->max_participants - $this->current_participants);
    }
}
