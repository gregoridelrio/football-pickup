@extends('layouts.app')

@section('title', $match->description)

@section('content')
    <div class="mb-6">
        <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Volver</a>
    </div>
    <div class="bg-white p-6 rounded border border-gray-200">
        <h1 class="text-3xl font-bold mb-6">{{ $match->description }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-bold mb-4">Información del partido</h2>
                <div class="space-y-2 text-gray-700">
                    <p><strong>Fecha:</strong> {{ $match->starts_at->format('d/m/Y') }}</p>
                    <p><strong>Hora:</strong> {{ $match->starts_at->format('H:i') }}</p>
                    <p><strong>Duración:</strong> {{ $match->duration }} minutos</p>
                    <p><strong>Tipo:</strong> {{ $match->match_type }}</p>
                    <p><strong>Jugadores máx:</strong> {{ $match->max_players }}</p>
                    <p><strong>Nivel:</strong> {{ $match->required_level }}</p>
                    <p><strong>Precio:</strong> {{ $match->price == 0 ? 'Gratis' : $match->price . '€' }}</p>
                    <p><strong>Estado:</strong> 
                        <span class="inline-block px-2 py-1 text-sm rounded">
                            {{ ucfirst($match->status) }}
                        </span>
                    </p>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">Ubicación</h2>
                <div class="space-y-2 text-gray-700 mb-6">
                    <p><strong>Lugar:</strong> {{ $match->location_name }}</p>
                    <p><strong>Dirección:</strong> {{ $match->address }}</p>
                    <p><strong>Ciudad:</strong> {{ $match->city }}</p>
                </div>
                <h2 class="text-xl font-bold mb-4">Organizador</h2>
                <div class="text-gray-700">
                    <p><strong>Nombre:</strong> {{ $match->organizer->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection