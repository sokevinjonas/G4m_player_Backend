<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ReferralReward;
use Illuminate\Validation\Rule;
use App\Services\ReferralService;
use App\Notifications\WelcomeNewUser;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        // Génère un code unique pour ce user
        do {
            $code = strtoupper(Str::random(6));
        } while (User::where('referral_code', $code)->exists());

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'gameur',
            'country' => $data['country'] ?? null,
            'description' => $data['description'] ?? null,
            'referral_code' => $code,
            // On ne met pas referred_by ici, il sera mis à jour par le service
        ]);

        
        // Gère le parrainage via le service
        app(ReferralService::class)->handleReferral($user, $data['referred_by'] ?? null);
        
        // Envoie une notification de bienvenue (elle sera mise en queue)
        $user->notify(new WelcomeNewUser());

        return response()->json([
            'message' => 'User registered successfully',
            'user'  => $user->fresh(), // pour avoir referred_by à jour
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }

}
