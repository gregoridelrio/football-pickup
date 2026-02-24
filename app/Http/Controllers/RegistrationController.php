<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(FootballMatch $match)
    {
        $userId = auth()->id();
        $matchId = $match->id;

        if ($match->organizer_id === $userId) {
            return redirect()->back()->with('error', 'No puedes unirte a tu propio partido');
        }

        $alreadyRegistered = Registration::where('match_id', $matchId)
            ->where('user_id', $userId)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->back()->with('error', 'Ya estas inscrito en este partido');
        }

        $registeredCount = Registration::where('match_id', $matchId)
            ->where('status', 'confirmed')
            ->count();

        if ($registeredCount >= $match->max_players) {
            return redirect()->back()->with('error', 'El partido esta completo');
        }

        Registration::create([
            'match_id' => $matchId,
            'user_id' => $userId,
            'status' => 'confirmed',
        ]);

        return redirect()->back()->with('success', 'Te has unido al partido correctamente');
    }

    public function destroy(FootballMatch $match)
    {
        $userId = auth()->id();

        $registration = Registration::where('match_id', $match->id)
            ->where('user_id', $userId)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'No estas inscrito en este partido');
        }

        $registration->delete();

        return redirect()->back()->with('success', 'Te has salido del partido');
    }
}
