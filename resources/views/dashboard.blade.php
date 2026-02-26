@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')
<h1 class="text-3xl font-bold mb-8">Mi perfil</h1>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
    {{ session('success') }}
</div>
@endif

<div class="bg-white p-6 rounded border border-gray-200">
    <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
        <div>
            <p class="text-gray-600 text-sm">Nombre</p>
            <p class="font-bold text-lg">{{ $user->name }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">Email</p>
            <p class="font-bold text-lg">{{ $user->email }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">Miembro desde</p>
            <p class="font-bold text-lg">{{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <form method="POST" action="{{ route('dashboard.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="phone" class="block font-bold mb-1">Telefono</label>
            <input type="number" name="phone" id="phone" value="{{ ($user->phone) }}"
                class="w-full border border-gray-300 rounded px-3 py-2" placeholder="666666666">
        </div>
        <div class="mb-4">
            <label for="skill_level" class="block font-bold mb-1">Nivel de juego</label>
            <select name="skill_level" id="skill_level" class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Selecciona un nivel</option>
                <option value="beginner" {{ ($user->skill_level) == 'beginner' ? 'selected' : ''
                    }}>Principiante</option>
                <option value="intermediate" {{ ($user->skill_level) == 'intermediate' ? 'selected' :
                    '' }}>Intermedio</option>
                <option value="advanced" {{ ($user->skill_level) == 'advanced' ? 'selected' : ''
                    }}>Avanzado</option>
            </select>
        </div>
        <div class="mb-6">
            <label for="favourite_position" class="block font-bold mb-1">Posicion preferida</label>
            <select name="favourite_position" id="favourite_position"
                class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Selecciona una posicion</option>
                <option value="goalkeeper" {{ ($user->favourite_position) == 'goalkeeper' ?
                    'selected' : '' }}>Portero</option>
                <option value="defender" {{ ($user->favourite_position) == 'defender' ?
                    'selected' : '' }}>Defensa</option>
                <option value="midfielder" {{ ($user->favourite_position) == 'midfielder' ?
                    'selected' : '' }}>Centrocampista</option>
                <option value="forward" {{ ($user->favourite_position) == 'forward' ?
                    'selected' : '' }}>Delantero</option>
            </select>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Guardar cambios
            </button>
            <a href="{{ route('home') }}"
                class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 inline-block">
                Volver al inicio
            </a>
        </div>
    </form>
</div>
@endsection