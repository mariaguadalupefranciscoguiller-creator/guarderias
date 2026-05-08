<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loto Azul | Inventario</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { background-color: #f0f2f5; }
        .sidebar { 
            background-color: #1a237e; /* Azul oscuro elegante para el Hotel */
            min-height: 100vh; 
            width: 260px; 
            position: fixed; 
            color: white; 
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar-header { padding: 25px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); text-align: center; }
        .nav-link { color: rgba(255,255,255,.7); margin: 5px 15px; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #fff; background-color: rgba(255,255,255,0.1); border-radius: 10px; }
        .main-wrapper { margin-left: 260px; padding: 30px; width: calc(100% - 260px); }
        .sidebar-section { 
            text-transform: uppercase; 
            font-size: 0.7rem; 
            font-weight: bold; 
            color: rgba(255,255,255,0.4); 
            padding: 20px 25px 5px; 
        }
        .card-menu {
            border-radius: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h4 class="m-0 fw-bold">LOTO AZUL</h4>
            <small class="text-info">Gestión de Bodega</small>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-section">Inventario</div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="/menu-principal">🏠 Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="/productos">📦 Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="/categorias">🗂️ Categorías</a></li>
            </ul>

            <div class="sidebar-section">Movimientos</div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/entradas">📥 Entradas</a></li>
                <li class="nav-item"><a class="nav-link" href="/salidas">📤 Salidas</a></li>
            </ul>

            <div class="sidebar-section">Personal</div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/empleados">👥 Empleados</a></li>
                <li class="nav-item"><a class="nav-link" href="/encargados">👤 Encargados</a></li>
            </ul>
        </div>
    </aside>

    <div class="main-wrapper">
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>