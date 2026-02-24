@extends('layouts.app')

@section('title', 'Error 404')

@section('content')

<div class="text-center">
  <h1 class="text-2xl font-bold text-gray-800 mb-8">Error 404</h1>

  <p class="text-2xl font-semibold text-gray-600 mb-8">Pagina no encontrada</p>

  <div>
    <a href="{{ route('home') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 inline-block">
      Volver al inicio
    </a>
  </div>
</div>


@endsection