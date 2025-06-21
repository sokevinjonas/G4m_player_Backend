<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    public function show($id)
    {
        $game = Game::with(['competitions', 'groups', 'players'])->findOrFail($id);
        return response()->json($game);
    }
}
