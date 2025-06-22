<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\B_office\AuthController;
use App\Http\Controllers\B_office\DashboardController;


Route::get('/login.php', [AuthController::class, 'login'])->name('login');
Route::post('/g4m_auth_login.php', [AuthController::class, 'auth_login'])->name('auth_login');

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('welcome_admin');

    Route::get('/logout.php', [_AuthController::class, 'logout'])->name('logout');

    });