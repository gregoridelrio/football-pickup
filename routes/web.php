<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

Route::get('/', [MatchController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');

    Route::post('/matches/{match}/join', [RegistrationController::class, 'store'])->name('matches.join');
    Route::delete('/matches/{match}/leave', [RegistrationController::class, 'destroy'])->name('matches.leave');
});

Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::put('dashboard', [DashboardController::class, 'update'])
    ->middleware(['auth'])
    ->name('dashboard.update');

require __DIR__ . '/settings.php';
