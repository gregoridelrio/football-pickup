@extends('layouts.app')

@section('title', $match->description)

@section('content')

<div class="mb-6 flex gap-4 items-center">
    <a href="{{ route('home') }}"
        class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Volver</a>
    @auth
    @if($match->organizer_id === auth()->id())
    <a href="{{ route('matches.edit', $match) }}"
        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
        Editar
    </a>

    <form method="POST" action="{{ route('matches.destroy', $match) }}" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Eliminar
        </button>
    </form>
    @endif
    @endauth
</div>
@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif
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
    @auth
    @php
    $isOrganizer = $match->organizer_id === auth()->id();
    $isRegistered = $match->registrations->where('user_id', auth()->id())->isNotEmpty();
    $isFull = $match->registrations->count() >= $match->max_players;
    @endphp

    @if(!$isOrganizer)
    <div class="mt-6 pt-6 border-t border-gray-200">
        @if($isRegistered)
        <form method="POST" action="{{ route('matches.leave', $match) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">
                Salirse del partido
            </button>
        </form>
        @elseif($isFull)
        <p class="text-gray-500">El partido esta completo</p>
        @else
        <form method="POST" action="{{ route('matches.join', $match) }}">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                Unirse al partido
            </button>
        </form>
        @endif
    </div>
    @endif
    @endauth

</div>
<div class="bg-white p-6 rounded border border-gray-200 mt-6">
    @livewire('match-comments', ['match' => $match])
</div>

@endsection