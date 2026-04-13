@extends('layouts.bodega')

@section('title', 'Control de Inventario - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">Gestión de Inventario Hotel Loto Azul</h1>
        <p class="text-muted fs-4">Área de Bodega</p>
    </div>

    <div class="row g-4 justify-content-center">
        
        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Productos</h2>
                    <a href="{{ route('productosdos.index') }}" class="btn btn-primary w-100 py-2 fw-bold">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Categorías</h2>
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary w-100 py-2 fw-bold">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Entradas</h2>
                    <a href="{{ route('entradas.index') }}" class="btn btn-primary w-100 py-2 fw-bold text-white">Registrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Salidas</h2>
                    <a href="{{ route('salidas.index') }}" class="btn btn-primary w-100 py-2 fw-bold">Registrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Empleados</h2>
                    <a href="{{ route('empleados.index') }}" class="btn btn-primary w-100 py-2 fw-bold">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0 text-center p-3">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-4">Encargados</h2>
                    <a href="{{ route('encargados.index') }}" class="btn btn-primary w-100 py-2 fw-bold">Gestionar</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection