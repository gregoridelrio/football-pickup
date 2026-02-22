@extends('layouts.app')

@section('title', 'Crear Partido')

@section('content')

    <div class="mb-6">
        <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Volver</a>
    </div>
    <div class="bg-white p-6 rounded border border-gray-200 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Crear Nuevo Partido</h1>

        <form method="POST" action="{{ route('matches.store') }}">
            @csrf

            <div class="mb-4">
                <label for="description" class="block font-bold mb-1">Descripcion</label>
                <input type="text" name="description" id="description" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="starts_at" class="block font-bold mb-1">Fecha y hora</label>
                <input type="datetime-local" name="starts_at" id="starts_at" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="duration" class="block font-bold mb-1">Duracion (minutos)</label>
                <input type="number" name="duration" id="duration" min="30" max="180" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="match_type" class="block font-bold mb-1">Tipo de partido</label>
                <select name="match_type" id="match_type" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="5vs5">5 vs 5</option>
                    <option value="7vs7">7 vs 7</option>
                    <option value="11vs11">11 vs 11</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="max_players" class="block font-bold mb-1">Jugadores maximos</label>
                <input type="number" name="max_players" id="max_players" min="2" max="22" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="required_level" class="block font-bold mb-1">Nivel requerido</label>
                <select name="required_level" id="required_level" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="beginner">Principiante</option>
                    <option value="intermediate">Intermedio</option>
                    <option value="advanced">Avanzado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block font-bold mb-1">Precio por jugador (€)</label>
                <input type="number" step="0.01" name="price" id="price" min="0" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="location_name" class="block font-bold mb-1">Nombre del lugar</label>
                <input type="text" name="location_name" id="location_name" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="address" class="block font-bold mb-1">Direccion</label>
                <input type="text" name="address" id="address" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="city" class="block font-bold mb-1">Ciudad</label>
                <input type="text" name="city" id="city" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Crear Partido
                </button>
                <a href="{{ route('home') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection