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
}
