@extends('layouts.app')

@section('title', 'Control de Inventario')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Gestión de Inventario Hotel Loto Azul</h2>
        <p class="text-muted">Bodega</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Productos</h2>
                    <a href="{{ route('productosdos.index') }}" class="btn btn-primary w-100 mt-2">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Categorías</h2>
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary w-100 mt-2">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Entradas</h2>
                    <a href="{{ route('entradas.index') }}" class="btn btn-primary text-white w-100 mt-2">Registrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Salidas</h2>
                    <a href="{{ route('salidas.index') }}" class="btn btn-primary w-100 mt-2">Registrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Empleados</h2>
                    <a href="{{ route('empleados.index') }}" class="btn btn-primary w-100 mt-2">Gestionar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-3">
                <div class="card-body">
                    <div class="display-5 mb-3"></div>
                    <h2 class="card-title fw-bold">Encargados</h2>
                    <a href="{{ route('encargados.index') }}" class="btn btn-primary w-100 mt-2">Gestionar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection