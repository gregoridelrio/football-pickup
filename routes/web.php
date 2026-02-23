<?php

use App\Http\Controllers\MatchController;

use Illuminate\Support\Facades\Route;

Route::get('/', [MatchController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');
});

Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';
