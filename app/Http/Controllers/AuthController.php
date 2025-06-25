<?php

namespace App\Http\Controllers;

use Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ReferralReward;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        // Génère un code unique pour ce user
        do {
            $code = strtoupper(Str::random(8));
        } while (User::where('referral_code', $code)->exists());

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'gameur',
            'country' => $data['country'] ?? null,
            'description' => $data['description'] ?? null,
            'referral_code' => $code,
            // Si code de parrainage fourni, on récupère l'id du parrain
            'referred_by' => isset($data['referral_code'])
                ? User::where('referral_code', $data['referral_code'])->value('id')
                : null,
        ]);

        // Si parrainage, crée la récompense
        if (isset($data['referral_code'])) {
            $referrerId = User::where('referral_code', $data['referral_code'])->value('id');
            if ($referrerId) {
                ReferralReward::create([
                    'referrer_id' => $referrerId,
                    'referred_id' => $user->id,
                ]);
            }
        }

        return response()->json([
            'message' => 'User registered successfully',
            'user'  => $user,
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

    public function profile(Request $request)
    {
        $user = $request->user()->load('games', 'competitions', 'badges');

        return response()->json($user);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json($user);
    }
}
