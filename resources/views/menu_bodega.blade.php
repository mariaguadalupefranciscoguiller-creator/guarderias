@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block vh-100 shadow" style="background-color: #1a202c !important; position: fixed; z-index: 100;">
            <div class="position-sticky pt-4 px-3 text-center">
                <h4 class="text-white fw-bold mb-1">LOTO AZUL</h4>
                <p class="text-info small fw-bold">Gestión de Bodega</p>
                <hr class="text-white opacity-25">
                
                <ul class="nav flex-column text-start mt-4">
                    <li class="nav-item mb-2">
                        <p class="text-muted small fw-bold mb-1 ps-3 text-uppercase">Inventario</p>
                        <a class="nav-link text-white active bg-primary rounded-3 p-2 mb-2 shadow-sm" href="{{ route('menu.principal') }}">
                            🏠 Inicio
                        </a>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('productosdos.index') }}">📦 Productos</a>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('categorias.index') }}">📂 Categorías</a>
                    </li>

                    <li class="nav-item mb-2 mt-3">
                        <p class="text-muted small fw-bold mb-1 ps-3 text-uppercase">Movimientos</p>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('entradas.index') }}">📥 Entradas</a>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('salidas.index') }}">📤 Salidas</a>
                    </li>

                    <li class="nav-item mb-2 mt-3">
                        <p class="text-muted small fw-bold mb-1 ps-3 text-uppercase">Personal</p>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('empleados.index') }}">👥 Empleados</a>
                        <a class="nav-link text-white-50 p-2 mb-1" href="{{ route('encargados.index') }}">👨‍💼 Encargados</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto p-0 bg-light" style="min-height: 100vh; margin-left: 16.66%;">
            
            <div class="d-flex justify-content-between align-items-center bg-white shadow-sm py-3 px-5 mb-5">
                <div>
                    <h5 class="m-0 fw-bold text-muted">Panel de Control / Bodega</h5>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger fw-bold shadow-sm" 
                            style="border-radius: 12px; padding: 10px 25px; border: none; background-color: #dc3545;">
                        Cerrar Sesión 🚪
                    </button>
                </form>
            </div>

            <div class="px-md-5 pb-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bold display-5 text-dark">Gestión de Inventario Hotel Loto Azul</h1>
                    <p class="text-muted fs-4">Área de Bodega</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Productos</h2>
                                <a href="{{ route('productosdos.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Gestionar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Categorías</h2>
                                <a href="{{ route('categorias.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Gestionar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Entradas</h2>
                                <a href="{{ route('entradas.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Registrar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Salidas</h2>
                                <a href="{{ route('salidas.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Registrar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Empleados</h2>
                                <a href="{{ route('empleados.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Gestionar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <h2 class="card-title fw-bold mb-4">Encargados</h2>
                                <a href="{{ route('encargados.index') }}" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">Gestionar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>

<style>
    .nav-link { transition: 0.2s; color: rgba(255,255,255,0.7) !important; }
    .nav-link:hover { color: white !important; background: rgba(255,255,255,0.1); border-radius: 8px; }
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); }
</style>
@endsection