@extends('layouts.app')

@section('title', 'Partidos')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Partidos Disponibles</h1>

    @if($matches->isEmpty())
        <div class="bg-white p-8 rounded border border-gray-200">
            <p class="text-gray-500">No hay partidos disponibles.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($matches as $match)
                <div class="bg-white p-6 rounded border border-gray-200">
                    <h2 class="text-xl font-bold mb-3">{{ $match->description }}</h2>
                    
                    <div class="space-y-1 text-gray-700">
                        <p><strong>Fecha:</strong> {{ $match->starts_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Ciudad:</strong> {{ $match->city }}</p>
                        <p><strong>Tipo:</strong> {{ $match->match_type }}</p>
                        <p><strong>Jugadores:</strong> {{ $match->max_players }}</p>
                        <p><strong>Precio:</strong> {{ $match->price == 0 ? 'Gratis' : $match->price . '€' }}</p>
                        <p><strong>Estado:</strong> {{ $match->status }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection