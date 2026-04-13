@extends('layouts.bodega')

@section('title', 'Inventario de Productos - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white">✨ Inventario de Productos</h2>
            <p class="mb-0 opacity-75">Control Maestro - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('productosdos.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-primary">
            <i class="fas fa-plus-circle me-2"></i> Nuevo Registro
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #212529; color: #ffca28;">
                        <tr>
                            <th class="ps-4 py-3" style="width: 80px;">ID</th>
                            <th>Producto</th>
                            <th class="text-center">Disponibilidad</th>
                            <th>Medida</th>
                            <th>Fecha Ingreso</th>
                            <th>Categoría</th>
                            <th class="text-center pe-4 text-white" style="width: 220px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productosdos as $producto)
                        <tr style="border-left: 5px solid #0d6efd;">
                            <td class="ps-4 fw-bold text-primary">#{{ $producto->id_producto }}</td>
                            <td>
                                <div class="fw-bold text-dark" style="font-size: 1.1rem;">{{ $producto->nombre }}</div>
                            </td>
                            <td class="text-center">
                                @if($producto->cantidad_existencia <= 5)
                                    <span class="text-danger fw-bold">
                                        <i class="fas fa-exclamation-triangle me-1"></i> Quedan: {{ $producto->cantidad_existencia }}
                                    </span>
                                @else
                                    <span class="text-success fw-bold">
                                        <i class="fas fa-check-circle me-1"></i> Hay: {{ $producto->cantidad_existencia }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="text-dark">{{ $producto->unidad_medida }}</span>
                            </td>
                            <td>
                                <span class="text-muted small">
                                    <i class="far fa-calendar-alt me-1 text-info"></i> {{ $producto->fecha_entrada }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-secondary">Cat: {{ $producto->id_categoria }}</span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('productosdos.edit', $producto->id_producto) }}" 
                                       class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0" 
                                       style="background-color: #ffca28; padding: 6px 12px;">
                                        <i class="fas fa-edit me-1"></i> <span>Editar</span>
                                    </a>

                                    <form action="{{ route('productosdos.destroy', $producto->id_producto) }}" method="POST" 
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm d-flex align-items-center border-0" 
                                                style="background-color: #ff4d4d; padding: 6px 12px;">
                                            <i class="fas fa-trash me-1"></i> <span>Borrar</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <h4 class="text-muted">No se encontraron productos en la base de datos</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer bg-white py-4 border-0 text-center">
            <a href="{{ route('menu.principal') }}" class="btn btn-dark btn-lg px-5 shadow rounded-pill">
                <i class="fas fa-arrow-left me-2"></i> Regresar al Panel
            </a>
        </div>
    </div>
</div>

<style>
    /* Efecto suave al pasar el mouse por la fila */
    .table-hover tbody tr:hover {
        background-color: #f8fbff !important;
        transition: 0.2s;
    }
    /* Estilo para los botones pequeños */
    .btn-sm {
        font-size: 0.85rem;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection