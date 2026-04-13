<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold text-success" href="{{ route('dashboard') }}">GUARDERÍA 2</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('personas.index') }}">Personas</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('familiares.index') }}">Familiares</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('baja_ninios.index') }}">Baja Niños</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('ninios.index') }}">Niños</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('platos.index') }}">Platos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('ingredientes.index') }}">Ingredientes</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('menus.index') }}">Menús</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('registro_comidas.index') }}">Reg. Comidas</a></li>

                            <li class="nav-item"><a class="nav-link" href="{{ route('centros.index') }}">Centros</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('abonos.index') }}">Abonos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('registro_cuentas.index') }}">Cuentas</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('parentezcos.index') }}">Parentescos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('alergias.index') }}">Alergias</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{-- Mantenemos $slot para compatibilidad con Breeze --}}
                @isset($slot)
                    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                @endisset

                {{-- Contenido de tus vistas CRUD --}}
                <div class="container py-4">
                    @yield('content')
                </div>
            </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>