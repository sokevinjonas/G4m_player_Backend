<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\UpdateUserRequest;

class UserController extends Controller
{

    public function update(UpdateUserRequest $request): JsonResponse
    {
        $user = $request->user();
        $oldUser = $user->replicate(); // Snapshot avant mise à jour

        $data = $request->validated();

        // Gérer l'upload de l'avatar si présent
        if ($request->hasFile('avatar')) {
            // Supprimer l'ancien avatar si existant
            if (!empty($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Stocker le nouvel avatar
            $path = $request->file('avatar')->store('avatars', 'public');
            if ($path) {
                $data['avatar'] = $path;
            }
        }

        // Hasher le mot de passe si fourni
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // Mise à jour utilisateur
        $user->update($data);

        // Vérification du profil complété
        $profileComplete = $this->checkProfileCompletion($user, $oldUser);

        if ($profileComplete) {
            $user->increment('points', 10);
        }

        // Recharger les données à jour
        $user = $user->fresh();

        // Ajouter l'URL complète de l'avatar si existant
        if ($user->avatar) {
            $user->avatar = Storage::disk('public')->url($user->avatar);
        }

        return response()->json([
            'message' => $profileComplete
                ? 'Profil mis à jour avec succès! Vous avez gagné 10 points pour avoir complété votre profil.'
                : 'Profil mis à jour avec succès!',
            'user' => $user,
            'points_awarded' => $profileComplete ? 10 : 0,
        ]);
    }

    
    private function checkProfileCompletion(User $newUser, User $oldUser): bool
    {
        // Check if profile is now complete
        $profileNowComplete = !is_null($newUser->avatar) && 
                             !is_null($newUser->country) && 
                             !is_null($newUser->description);
        
        // Check if at least one field was null before
        $hadIncompleteProfile = is_null($oldUser->avatar) || 
                               is_null($oldUser->country) || 
                               is_null($oldUser->description);
        
        // Award points only if profile is now complete AND was incomplete before
        return $profileNowComplete && $hadIncompleteProfile;
    }
}
