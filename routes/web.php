<?php

use App\Http\Controllers\MatchController;

use Illuminate\Support\Facades\Route;

Route::get('/', [MatchController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';
