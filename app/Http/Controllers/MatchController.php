<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::orderBy('starts_at', 'desc')->get();
        return view('matches.index', compact('matches'));
    }

    public function show(FootballMatch $match)
    {
        return view('matches.show', compact('match'));
    }

    public function create()
    {
        return view('matches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'starts_at' => 'required|date|after:now',
            'duration' => 'required|integer|min:30|max:180',
            'match_type' => 'required|in:5vs5,7vs7,11vs11',
            'max_players' => 'required|integer|min:2|max:22',
            'required_level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'location_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
        ]);

        $validated['organizer_id'] = auth()->id();
        $validated['status'] = 'open';

        FootballMatch::create($validated);

        return redirect()->route('home')->with('success', 'Partido creado correctamente');
    }
}
