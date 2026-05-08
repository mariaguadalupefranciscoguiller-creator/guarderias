@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">✨ Inventario de Productos</h1>
            <p class="text-muted">Hotel Loto Azul - Gestión de Bodega</p>
        </div>
        <a href="{{ route('productosdos.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">
            + Nuevo Registro
        </a>
    </div>

    <div class="row g-4">
        @foreach($productodos as $producto)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                <div class="card-body p-4">
                    
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h4 class="fw-bold mb-1 text-dark">{{ $producto->nombre }}</h4>
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                                ID: #{{ $producto->id_producto }}
                            </span>
                        </div>
                        <div class="bg-light rounded-circle p-3">
                            <span class="fs-4">📦</span>
                        </div>
                    </div>

                    <hr class="text-muted opacity-25">

                    <div class="row text-center my-4">
                        <div class="col-6 border-end">
                            <h3 class="fw-bold text-danger mb-0">{{ $producto->cantidad_existencia }}</h3>
                            <small class="text-muted text-uppercase" style="font-size: 0.7rem;">Quedan</small>
                        </div>
                        <div class="col-6">
                            <h3 class="fw-bold text-dark mb-0">{{ $producto->unidad_medida }}</h3>
                            <small class="text-muted text-uppercase" style="font-size: 0.7rem;">Unidad</small>
                        </div>
                    </div>

                    <div class="bg-light rounded-3 p-3 mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-muted">📅 Ingreso:</small>
                            <small class="fw-bold text-dark">{{ $producto->fecha_entrada }}</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">🗂️ Categoría:</small>
                            <small class="fw-bold text-primary">{{ $producto->categoria_nom ?? 'Sin categoría' }}</small>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('productosdos.edit', $producto->id_producto) }}" 
                           class="btn btn-outline-warning w-100 fw-bold rounded-pill">Editar</a>
                        
                        <form action="{{ route('productosdos.destroy', $producto->id_producto) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100 fw-bold rounded-pill" 
                                    onclick="return confirm('¿Borrar producto?')">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5 mb-5">
        <a href="{{ url('/menu-principal') }}" class="btn btn-dark rounded-pill px-5">
            ← Regresar al Panel
        </a>
    </div>
</div>

<style>
    .card { transition: all 0.3s ease; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .btn-primary { background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%); border: none; }
</style>
@endsection