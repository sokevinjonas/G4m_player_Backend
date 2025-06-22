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
        ], [
            'name.required' => 'Le nom du type de jeu est obligatoire.',
            'name.unique' => 'Ce type de jeu existe déjà.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
        ]);
        TypesGame::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Type de jeu ajouté avec succès.');
    }
}
