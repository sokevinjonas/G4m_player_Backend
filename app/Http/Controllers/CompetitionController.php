<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        return Competition::with('game', 'players')->orderBy('date', 'desc')->get();
    }

    public function show($id)
    {
        $competition = Competition::findOrFail($id);
        return response()->json($competition->load('game', 'players'));
    }

    public function registerToCompetition(Request $request)
    {
        $userId = auth()->id();
        $competitionId = $request->query('competition_id');

        if (!$competitionId) {
            return response()->json(['message' => 'Competition ID manquant'], 422);
        }

        $competition = Competition::findOrFail($competitionId);

        if ($competition->players()->where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'Already registered'], 400);
        }

        $competition->players()->attach($userId, ['points' => 0]);

        return response()->json(['message' => 'Registered successfully']);
    }

    public function UnregistrationToCompetition(Request $request)
    {
        $userId = auth()->id();
        $competitionId = $request->query('competition_id');

        if (!$competitionId) {
            return response()->json(['message' => 'Competition ID manquant'], 422);
        }

        $competition = Competition::findOrFail($competitionId);

        if (!$competition->players()->where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'Not registered'], 400);
        }

        $competition->players()->detach($userId);

        return response()->json(['message' => 'Unregistered successfully']);
    }


    public function players($id)
    {
        $competition = Competition::findOrFail($id);

        $players = $competition->players()->orderByDesc('pivot_points')->get();

        return response()->json($players);
    }
}