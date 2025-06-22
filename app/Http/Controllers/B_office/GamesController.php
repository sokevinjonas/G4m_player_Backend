<?php

namespace App\Http\Controllers\B_office;

use App\Models\Game;
use App\Models\TypesGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Games\StoreGameRequest;

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

    public function store(StoreGameRequest $request)
    {
        $validated = $request->validated();

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
