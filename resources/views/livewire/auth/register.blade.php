@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded border border-gray-200 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Football Pickup</h1>
            <p class="text-gray-600">Crea tu cuenta</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Tu nombre">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="nombre@email.com">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block font-bold mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="••••••••">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block font-bold mb-1">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="••••••••">
                @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded hover:bg-blue-600 font-bold">
                Registrarse
            </button>
        </form>
        <div class="text-center mt-6">
            <span class="text-gray-600">¿Ya tienes cuenta?</span>
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-bold">
                Inicia sesion
            </a>
        </div>
    </div>
</div>
@endsection