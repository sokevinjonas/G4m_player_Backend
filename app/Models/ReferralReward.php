<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ReferralReward extends Model
{
    protected $table = 'referral_rewards';

    protected $guarded = ['id'];

    // Le parrain
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    // Le filleul
    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id');
    }
}
