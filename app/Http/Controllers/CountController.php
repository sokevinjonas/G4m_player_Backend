<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\UsersBadge;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\CompetitionsUser;

class CountController extends Controller
{
    /**
     * Count the number of competitions a user is registered in.
     */
    public function countCompetitionsUser()
    {
        $userId = auth()->id();
        $count = CompetitionsUser::where('user_id', $userId)->count() ?? 0;
        return response()->json(['count' => $count]);
    }

    /**
     * Get the total points of a user in competitions.
     */
    public function pointsCompetitionsUser()
    {
        $userId = auth()->id();
        $points = CompetitionsUser::where('user_id', $userId)->sum('points') ?? 0;
        return response()->json(['points' => $points]);
    }

    /**
     * Count all enabled competitions for the authenticated user.
     */
    public function countAllEnabledCompetitions()
    {
        $count = Competition::where('status', 'upcoming')->count();
        return response()->json(['count' => $count]);
    }

    /**
     * Count all games.
     */
    public function countAllGame()
    {
        $count = Game::count() ?? 0;
        return response()->json(['count' => $count]);
    }

    /**
     * Count the number of badges for the authenticated user.
     */
    public function countUsersBadge()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['count' => 0]);
        }
        $badgeCount = UsersBadge::where('user_id', $user->id)->where('unlocked', true)->count() ?? 0;
        return response()->json(['count' => $badgeCount]);
    }
}
