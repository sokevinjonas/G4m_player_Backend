<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        return Competition::with('game')->orderBy('date', 'desc')->get();
    }

    public function show($id)
    {
        $competition = Competition::findOrFail($id);
        return response()->json($competition->load([
            'game',
            'players' 
        ]));
    }

    public function registerToCompetition(Request $request, $id)
    {
        $competition = Competition::findOrFail($id);

        $user = $request->user();

        if ($competition->players()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'Already registered'], 400);
        }

        $competition->players()->attach($user->id, ['points' => 0]);

        return response()->json(['message' => 'Registered successfully']);
    }

    public function players($id)
    {
        $competition = Competition::findOrFail($id);

        $players = $competition->players()->orderByDesc('pivot_points')->get();

        return response()->json($players);
    }
}