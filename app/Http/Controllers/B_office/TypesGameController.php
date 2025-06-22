<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypesGame;

class TypesGameController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:types_games,name',
        ]);
        TypesGame::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Type de jeu ajouté avec succès.');
    }
}
