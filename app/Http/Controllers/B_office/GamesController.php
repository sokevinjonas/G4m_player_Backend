<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\TypesGame;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::with('typeGame')->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $types = TypesGame::all();
        return view('games.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'type_game_id' => 'required|exists:types_games,id',
            'contact_link' => 'nullable|array',
            'contact_link.*.type' => 'nullable|string|max:50',
            'contact_link.*.url' => 'nullable|string|max:255',
        ]);

        // Gestion du logo
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Gestion des contacts
        $contacts = [];
        if (!empty($validated['contact_link'])) {
            foreach ($validated['contact_link'] as $contact) {
                if (!empty($contact['type']) && !empty($contact['url'])) {
                    $contacts[] = [
                        'type' => $contact['type'],
                        'url' => $contact['url'],
                    ];
                }
            }
        }
        // dd($validated);

        Game::create([
            'name' => $validated['name'],
            'type_game_id' => $validated['type_game_id'],
            'logo' => $logoPath ? '/storage/' . $logoPath : null,
            'description' => $validated['description'] ?? null,
            'contact_link' => !empty($contacts) ? json_encode($contacts) : null,
        ]);

        return redirect()->back()->with('success', 'Jeu ajouté avec succès.');
    }
}
