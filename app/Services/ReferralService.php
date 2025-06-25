<?php

namespace App\Services;

use App\Models\User;
use App\Models\ReferralReward;
use App\Notifications\NewReferralReward;

class ReferralService
{
    /**
     * Gère le parrainage lors de l'inscription.
     */
    public function handleReferral(User $user, ?string $referralCode = null)
    {
        if (!$referralCode) {
            return;
        }

        // Trouver le parrain par son code de parrainage
        $referrer = User::where('referral_code', $referralCode)->first();
        if (!$referrer || $referrer->id === $user->id) {
            return; // Empêche l’auto-parrainage
        }

        // Met à jour le champ referred_by du nouvel utilisateur (stocke le CODE maintenant)
        $user->referred_by = $referralCode;
        $user->save();

        // Enregistre la récompense de parrainage
        ReferralReward::create([
            'referrer_id' => $referrer->id,
            'referred_id' => $user->id,
        ]);

        // Donne des points au parrain
        $referrer->increment('points', 10);

        // Envoyer les notifications (elles seront mises en queue)
        $referrer->notify(new NewReferralReward($user));
    }

}