@extends('layouts.app')

@section('title', 'Recuperar contraseña')

@section('content')
<div class="flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded border border-gray-200 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Football Pickup</h1>
            <p class="text-gray-600">Recuperar contraseña</p>
        </div>
        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-6">
                <label for="email" class="block font-bold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="nombre@email.com">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded hover:bg-blue-600 font-bold mb-4">
                Enviar enlace de recuperacion
            </button>
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
                    Volver al inicio de sesion
                </a>
            </div>
        </form>
    </div>
</div>
@endsection