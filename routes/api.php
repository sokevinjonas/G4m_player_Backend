<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CompetitionController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::put('profile', [AuthController::class, 'updateProfile']);
});


Route::get('competitions', [CompetitionController::class, 'index']);
Route::get('competitions/{id}', [CompetitionController::class, 'show']);
Route::post('competitions/{id}/register', [CompetitionController::class, 'registerToCompetition']);
Route::get('competitions/{id}/players', [CompetitionController::class, 'players']);

Route::get('games', [GameController::class, 'index']);
Route::get('games/{id}', [GameController::class, 'show']);

Route::get('badges', [BadgeController::class, 'index']);
Route::get('badges/{id}', [BadgeController::class, 'show']);

 

