<?php

namespace App\Http\Controllers;

use App\Models\CompetitionsUser;
use Illuminate\Http\Request;

class CompetitionsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionsUser $competitionsUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompetitionsUser $competitionsUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetitionsUser $competitionsUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionsUser $competitionsUser)
    {
        //
    }
    /**
     * Count the number of competitions a user is registered in.
     */
    public function count()
    {
        $userId = auth()->id();
        $count = CompetitionsUser::where('user_id', $userId)->count();
        return response()->json(['count' => $count]);
    }

    /**
     * Get the total points of a user in competitions.
     */
    public function points()
    {
        $userId = auth()->id();
        $points = CompetitionsUser::where('user_id', $userId)->sum('points');
        return response()->json(['points' => $points]);
    }
    /**
     * Count all enabled competitions for the authenticated user.
     */
    public function count_all_enable()
    {
        $count = CompetitionsUser::where('status', 'upcoming') // Assuming 'upcoming' is the status for enabled competitions
            ->count();
        return response()->json(['count' => $count]);
    }
}
