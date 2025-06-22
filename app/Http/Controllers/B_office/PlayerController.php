<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PlayerController extends Controller
{
    public function index()
    {
        $players = User::where('role', 'gameur')->get();
        return view('players.index', compact('players'));
    }
}
