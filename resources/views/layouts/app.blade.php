<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Football Pickup')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <nav class="bg-white border-b border-gray-200 mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                Football Pickup
            </a>
            
            <div class="space-x-4">
                @auth
                    <span class="text-gray-600">Hola, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:text-blue-800">
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>
    
    <div class="max-w-7xl mx-auto px-4">
        @yield('content')
    </div>

</body>
</html>