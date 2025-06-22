<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['typeGame', 'players', 'competitions'])->get();
        return response()->json($games);
    }

    public function show($id)
    {
        $game = Game::with(['typeGame', 'players', 'competitions'])->findOrFail($id);
        return response()->json($game);
    }

    public function countAll()
    {
        $count = Game::count();
        return response()->json(['count' => $count]);
    }
    
}
