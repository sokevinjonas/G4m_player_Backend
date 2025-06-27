<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\UsersBadgeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionsUserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // Route::get('profile', [AuthController::class, 'profile']);
    Route::put('userUpdate', [UserController::class, 'update']);
});


Route::get('competitions', [CompetitionController::class, 'index']);
Route::get('competitions/{id}', [CompetitionController::class, 'show']);
Route::post('competitions/{id}/register', [CompetitionController::class, 'registerToCompetition']);
Route::get('competitions/{id}/players', [CompetitionController::class, 'players']);

Route::get('games', [GameController::class, 'index']);
Route::get('games/{id}', [GameController::class, 'show']);

Route::get('badges', [BadgeController::class, 'index']);
Route::get('badges/{id}', [BadgeController::class, 'show']);
Route::post('LoadUsersBadge', [UsersBadgeController::class, 'LoadUsersBadge']);
// Load badges for the authenticated user
Route::get('LoadUsersBadgeLocked/{user_id}', [UsersBadgeController::class, 'LoadUsersBadgeLocked']);
Route::get('LoadUsersBadgeUnLocked/{user_id}', [UsersBadgeController::class, 'LoadUsersBadgeUnLocked']);

Route::get('countAllEnabledCompetitions', [CountController::class, 'countAllEnabledCompetitions']); // Count all enabled competitions
Route::get('countAllGame', [CountController::class, 'countAllGame']);
Route::get('countCompetitionsUser', [CountController::class, 'countCompetitionsUser']);
Route::get('pointsCompetitionsUser', [CountController::class, 'pointsCompetitionsUser']);
Route::get('countUsersBadge', [CountController::class, 'countUsersBadge']);




