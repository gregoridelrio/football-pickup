@extends('layouts.app')

@section('title', 'Iniciar sesion')

@section('content')
<div class="flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded border border-gray-200 w-full max-w-md">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Football Pickup</h1>
            <p class="text-gray-600">Inicia sesion para continuar</p>
        </div>
        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="nombre@email.com">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="block font-bold">Contraseña</label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>
                <input type="password" name="password" id="password" required
                    class="w-full border border-gray-300 rounded px-3 py-2" placeholder="••••••••">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-gray-700">Recuerdame</span>
                </label>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded hover:bg-blue-600 font-bold">
                Iniciar sesión
            </button>
        </form>
        @if (Route::has('register'))
        <div class="text-center mt-6">
            <span class="text-gray-600">¿No tienes cuenta?</span>
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-bold">
                Registrate
            </a>
        </div>
        @endif
    </div>
</div>
@endsection