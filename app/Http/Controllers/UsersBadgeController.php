<?php

namespace App\Http\Controllers;

use App\Models\UsersBadge;
use Illuminate\Http\Request;

class UsersBadgeController extends Controller
{
     /**
     * Load the badges for the authenticated user.
     */
    public function LoadUsersBadgeLocked($user_id)
    {
        if (!$user_id) {
            return response()->json(['badges' => []]);
        }
        $badges = UsersBadge::with('badge')
            ->where('user_id', $user_id)
            ->where('unlocked', false)
            ->get();

        return response()->json(['badges' => $badges]);
    }

    public function LoadUsersBadgeUnLocked($user_id)
    {
        if (!$user_id) {
            return response()->json(['badges' => []]);
        }
        $badges = UsersBadge::with('badge')
            ->where('user_id', $user_id)
            ->where('unlocked', false)
            ->get();

        return response()->json(['badges' => $badges]);
    }
}
