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
    /**
     * Update the authenticated user's profile
     * Awards 10 points if avatar, country, and description are all filled
     */
    public function update(UpdateUserRequest $request): JsonResponse
    {
        $user = $request->user();
        $oldUser = $user->replicate(); // Copy current state before update
        
        // Prepare data for update
        $data = $request->validated();
        
        // Handle avatar file upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }
        
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        // Update user data
        $user->update($data);
        
        // Check if user just completed their profile (avatar, country, description)
        $profileComplete = $this->checkProfileCompletion($user, $oldUser);
        
        if ($profileComplete) {
            $user->increment('points', 10);
            $message = 'Profil mis à jour avec succès! Vous avez gagné 10 points pour avoir complété votre profil.';
        } else {
            $message = 'Profil mis à jour avec succès!';
        }
        
        // Add full avatar URL to response
        $userData = $user->fresh();
        if ($userData->avatar) {
            $userData->avatar_url = Storage::disk('public')->url($userData->avatar);
        }
        
        return response()->json([
            'message' => $message,
            'user' => $userData,
            'points_awarded' => $profileComplete ? 10 : 0
        ]);
    }
    
    /**
     * Check if the user just completed their profile
     * Returns true if avatar, country, and description are now all filled
     * and at least one of them was null before
     */
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
