<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:20',
            'skill_level' => 'nullable|in:beginner,intermediate,advanced',
            'favourite_position' => 'nullable|in:goalkeeper,defender,midfielder,forward',
        ]);

        $request->user()->update($validated);

        return redirect()->route('dashboard')->with('success', 'Perfil actualizado correctamente');
    }
}
