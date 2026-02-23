@extends('layouts.app')

@section('title', 'Editar Partido')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white p-6 rounded border border-gray-200 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Editar Partido</h1>
        <form method="POST" action="{{ route('matches.update', $match) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="description" class="block font-bold mb-1">Descripcion:</label>
                <input type="text" name="description" id="description" 
                    value="{{ $match->description }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="starts_at" class="block font-bold mb-1">Fecha y hora:</label>
                <input type="datetime-local" name="starts_at" id="starts_at" 
                    value="{{ $match->starts_at->format('Y-m-d\TH:i') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="duration" class="block font-bold mb-1">Duracion (minutos):</label>
                <input type="number" name="duration" id="duration" 
                    value="{{ $match->duration }}" min="30" max="180" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="match_type" class="block font-bold mb-1">Tipo de partido:</label>
                <select name="match_type" id="match_type" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="5vs5" {{ $match->match_type == '5vs5' ? 'selected' : '' }}>5 vs 5</option>
                    <option value="7vs7" {{ $match->match_type == '7vs7' ? 'selected' : '' }}>7 vs 7</option>
                    <option value="11vs11" {{ $match->match_type == '11vs11' ? 'selected' : '' }}>11 vs 11</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="max_players" class="block font-bold mb-1">Jugadores maximos:</label>
                <input type="number" name="max_players" id="max_players" 
                    value="{{ $match->max_players }}" min="2" max="22" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="required_level" class="block font-bold mb-1">Nivel requerido:</label>
                <select name="required_level" id="required_level" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="beginner" {{ $match->required_level == 'beginner' ? 'selected' : '' }}>Principiante</option>
                    <option value="intermediate" {{ $match->required_level == 'intermediate' ? 'selected' : '' }}>Intermedio</option>
                    <option value="advanced" {{ $match->required_level == 'advanced' ? 'selected' : '' }}>Avanzado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block font-bold mb-1">Precio por jugador (€):</label>
                <input type="number" step="0.01" name="price" id="price" 
                    value="{{ $match->price }}" min="0" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="location_name" class="block font-bold mb-1">Nombre del lugar:</label>
                <input type="text" name="location_name" id="location_name" 
                    value="{{ $match->location_name }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="address" class="block font-bold mb-1">Direccion:</label>
                <input type="text" name="address" id="address" 
                    value="{{ $match->address }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="city" class="block font-bold mb-1">Ciudad:</label>
                <input type="text" name="city" id="city" 
                    value="{{ $match->city }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="status" class="block font-bold mb-1">Estado:</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="open" {{ $match->status == 'open' ? 'selected' : '' }}>Abierto</option>
                    <option value="full" {{ $match->status == 'full' ? 'selected' : '' }}>Completo</option>
                    <option value="cancelled" {{ $match->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                    <option value="finished" {{ $match->status == 'finished' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Guardar cambios
                </button>
                <a href="{{ route('matches.show', $match) }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 inline-block">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection