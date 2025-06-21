<?php

namespace App\Models;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersBadge extends Model
{
    use HasFactory;

    protected $table = 'users_badges';

    protected $fillable = [
        'user_id', 'badge_id',
    ];

    public $timestamps = true;

    protected $casts = [
        'user_id' => 'integer',
        'badge_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
}
