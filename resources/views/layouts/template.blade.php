<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión Administrativa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #0f172a; 
            --sidebar-hover: #1e293b;
            --accent-color: #10b981; 
            --text-muted: #94a3b8;
            --main-bg: #f1f5f9;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: var(--main-bg); 
            color: #1e293b;
            margin: 0;
        }

        /* Sidebar con Scroll Independiente */
        .sidebar { 
            background-color: var(--sidebar-bg); 
            width: 280px; 
            position: fixed; 
            top: 0;
            left: 0;
            bottom: 0;
            color: white; 
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
        }

        .sidebar-header { 
            padding: 2rem 1.5rem; 
            background: rgba(0,0,0,0.2);
            flex-shrink: 0;
        }

        .sidebar-menu { 
            flex-grow: 1;
            overflow-y: auto; /* Aquí se activa el "sube y baja" */
            padding-bottom: 2rem;
        }

        /* Personalización de la barra de scroll */
        .sidebar-menu::-webkit-scrollbar { width: 5px; }
        .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

        .sidebar-section { 
            text-transform: uppercase; 
            font-size: 0.7rem; 
            font-weight: 700; 
            color: var(--text-muted); 
            padding: 1.5rem 1.5rem 0.5rem; 
            letter-spacing: 1px;
        }

        .nav-link { 
            color: var(--text-muted); 
            margin: 0.2rem 1rem; 
            padding: 0.75rem 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.2s;
            text-decoration: none;
        }

        .nav-link:hover { color: white; background-color: var(--sidebar-hover); }
        .nav-link.active { 
            color: white; 
            background-color: var(--accent-color); 
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }

        /* Contenido Principal */
        .main-wrapper { 
            margin-left: 280px; 
            padding: 2rem; 
        }

        header.top-nav {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 992px) {
            .sidebar { margin-left: -280px; }
            .sidebar.show { margin-left: 0; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <aside class="sidebar shadow" id="sidebar">
        <div class="sidebar-header">
            <h4 class="m-0 text-white"><i class="bi bi-shield-lock-fill text-success me-2"></i>AdminPanel</h4>
            <small class="text-muted">Control de Gestión</small>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-section">Principal</div>
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="sidebar-section">Finanzas</div>
            <a class="nav-link {{ request()->is('abonos*') ? 'active' : '' }}" href="{{ url('/abonos') }}"><i class="bi bi-cash-stack"></i> Abonos</a>
            <a class="nav-link {{ request()->is('registro_cuentas*') ? 'active' : '' }}" href="{{ url('/registro_cuentas') }}"><i class="bi bi-receipt"></i> Cuentas</a>
            <a class="nav-link {{ request()->is('centros*') ? 'active' : '' }}" href="{{ url('/centros') }}"><i class="bi bi-building-gear"></i> Centros</a>

            <div class="sidebar-section">Gestión Alumnos</div>
            <a class="nav-link {{ request()->is('ninios*') ? 'active' : '' }}" href="{{ url('/ninios') }}"><i class="bi bi-person-video3"></i> Alumnos</a>
            <a class="nav-link {{ request()->is('familiares*') ? 'active' : '' }}" href="{{ url('/familiares') }}"><i class="bi bi-people"></i> Familiares</a>
            <a class="nav-link {{ request()->is('personas*') ? 'active' : '' }}" href="{{ url('/personas') }}"><i class="bi bi-person-vcard"></i> Personas</a>
            <a class="nav-link {{ request()->is('parentezcos*') ? 'active' : '' }}" href="{{ url('/parentezcos') }}"><i class="bi bi-diagram-3"></i> Parentescos</a>
            <a class="nav-link {{ request()->is('alergias*') ? 'active' : '' }}" href="{{ url('/alergias') }}"><i class="bi bi-heart-pulse"></i> Alergias</a>
            <a class="nav-link {{ request()->is('baja_ninios*') ? 'active' : '' }}" href="{{ url('/baja_ninios') }}"><i class="bi bi-person-x"></i> Bajas</a>

            <div class="sidebar-section">Alimentación</div>
            <a class="nav-link {{ request()->is('menus*') ? 'active' : '' }}" href="{{ url('/menus') }}"><i class="bi bi-calendar-week"></i> Menús</a>
            <a class="nav-link {{ request()->is('platos*') ? 'active' : '' }}" href="{{ url('/platos') }}"><i class="bi bi-egg-fried"></i> Platos</a>
            <a class="nav-link {{ request()->is('ingredientes*') ? 'active' : '' }}" href="{{ url('/ingredientes') }}"><i class="bi bi-basket"></i> Ingredientes</a>
            <a class="nav-link {{ request()->is('registro_comidas*') ? 'active' : '' }}" href="{{ url('/registro_comidas') }}"><i class="bi bi-clipboard-check"></i> Registro Comidas</a>

            <div class="sidebar-section">Sistema</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link w-100 border-0 bg-transparent text-danger text-start">
                    <i class="bi bi-box-arrow-right"></i> Salir del Sistema
                </button>
            </form>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="top-nav">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-dark d-lg-none" onclick="toggleSidebar()">☰</button>
                <h5 class="m-0 fw-bold">Gestión de Guardería</h5>
            </div>
            <div class="fw-bold text-secondary">
                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Administrador' }}
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>
</body>
</html>