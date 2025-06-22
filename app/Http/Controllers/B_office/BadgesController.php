<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBadgeRequest;
use Illuminate\Http\Request;

class BadgesController extends Controller
{
    public function index()
    {
        $badges = Badge::orderBy('id', 'desc')->get();
        return view('badges.index', compact('badges'));
    }

    public function create()
    {
        return view('badges.create');
    }

    public function store(StoreBadgeRequest $request)
    {
        $data = $request->validated();

        // Gestion de l'upload d'icône
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('badges', 'public');
            $data['icon'] = '/storage/' . $path;
        }

        Badge::create($data);

        return redirect()->route('badges.create')->with('success', 'Badge créé avec succès.');
    }
}
