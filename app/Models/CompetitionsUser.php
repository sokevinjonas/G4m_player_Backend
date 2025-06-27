<?php

namespace App\Models;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionsUser extends Model
{
    use HasFactory;
    protected $table = 'competitions_users';
    protected $guarded = ['id'];
    public $timestamps = true;
    
    protected $casts = [
        'points' => 'integer',
    ];
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
