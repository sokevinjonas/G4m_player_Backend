<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\B_office\GamesController;
use App\Http\Controllers\B_office\AuthController;
use App\Http\Controllers\B_office\PlayerController;
use App\Http\Controllers\B_office\DashboardController;
use App\Http\Controllers\B_office\TypesGameController;
use App\Http\Controllers\B_office\CompetitionsController;
use App\Http\Controllers\B_office\BadgesController;


Route::get('/login.php', [AuthController::class, 'login'])->name('login');
Route::post('/g4m_auth_login.php', [AuthController::class, 'auth_login'])->name('auth_login');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('welcome_admin');
    Route::get('/logout.php', [AuthController::class, 'logout'])->name('logout');
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');

    // Games routes
    Route::get('/games', [GamesController::class, 'index'])->name('games.index');
    Route::get('/games/create', [GamesController::class, 'create'])->name('games.create');
    Route::post('/games', [GamesController::class, 'store'])->name('games.store');
    // Types of games routes
    Route::get('/types-games', [TypesGameController::class, 'index'])->name('types_games.index');
    Route::get('/types-games/create', [TypesGameController::class, 'create'])->name('types_games.create');
    Route::post('/types-games', [TypesGameController::class, 'store'])->name('types_games.store');

    Route::get('/competitions', [CompetitionsController::class, 'index'])->name('competitions.index');
    Route::get('/competitions/create', [CompetitionsController::class, 'create'])->name('competitions.create');
    Route::post('/competitions', [CompetitionsController::class, 'store'])->name('competitions.store');
    Route::get('/competitions/{id}', [CompetitionsController::class, 'show'])->name('competitions.show');

    // Badges routes
    Route::get('/badges', [BadgesController::class, 'index'])->name('badges.index');
    Route::get('/badges/create', [BadgesController::class, 'create'])->name('badges.create');
    Route::post('/badges', [BadgesController::class, 'store'])->name('badges.store');
});