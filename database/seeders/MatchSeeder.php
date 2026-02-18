<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FootballMatch;
use Carbon\Carbon;

class MatchSeeder extends Seeder
{
    public function run(): void
    {
        FootballMatch::create([
            'organizer_id' => 1,
            'description' => 'Partido amistoso tarde',
            'starts_at' => Carbon::now()->addDays(3)->setTime(18, 0),
            'duration' => 90,
            'match_type' => '7vs7',
            'max_players' => 14,
            'required_level' => 'intermediate',
            'price' => 5.00,
            'location_name' => 'Polideportivo Municipal',
            'address' => 'Calle Mayor 123',
            'city' => 'Barcelona',
            'status' => 'open',
        ]);

        FootballMatch::create([
            'organizer_id' => 2,
            'description' => 'Fútbol sala viernes noche',
            'starts_at' => Carbon::now()->addDays(5)->setTime(20, 30),
            'duration' => 60,
            'match_type' => '5vs5',
            'max_players' => 10,
            'required_level' => 'beginner',
            'price' => 0,
            'location_name' => 'Pabellón La Sagrera',
            'address' => 'Av. Meridiana 350',
            'city' => 'Barcelona',
            'status' => 'open',
        ]);

        FootballMatch::create([
            'organizer_id' => 3,
            'description' => 'Partidazo domingo mañana',
            'starts_at' => Carbon::now()->addDays(7)->setTime(11, 0),
            'duration' => 120,
            'match_type' => '11vs11',
            'max_players' => 22,
            'required_level' => 'advanced',
            'price' => 10.00,
            'location_name' => 'Campo Municipal Nou Barris',
            'address' => 'Passeig Valldaura 186',
            'city' => 'Barcelona',
            'status' => 'open',
        ]);

        FootballMatch::create([
            'organizer_id' => 1,
            'description' => 'Partido rápido mediodía',
            'starts_at' => Carbon::now()->addDays(2)->setTime(13, 0),
            'duration' => 60,
            'match_type' => '7vs7',
            'max_players' => 14,
            'required_level' => 'intermediate',
            'price' => 3.50,
            'location_name' => 'Fútbol Factory',
            'address' => 'Carrer de Pamplona 88',
            'city' => 'Barcelona',
            'status' => 'open',
        ]);
    }
}
