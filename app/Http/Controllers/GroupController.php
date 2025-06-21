<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::with('game')->get();
    }

    public function show($id)
    {
        $group = Group::with('game')->findOrFail($id);
        return response()->json($group);
    }
}
