@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">📤 Registro de Salidas</h2>
            <p class="text-muted">Salida de mercancía de bodega - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('salidas.create') }}" class="btn btn-danger rounded-pill px-4 shadow-sm fw-bold">
            - Nueva Salida
        </a>
    </div>

    <div class="row g-3">
        @foreach($salidas as $salida)
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-danger-subtle text-danger rounded-pill">ID: #{{ $salida->id_salida }}</span>
                        <small class="text-muted">📅 {{ $salida->fecha_salida }}</small>
                    </div>
                    
                    <h5 class="fw-bold text-dark mb-1">{{ $salida->producto_nom }}</h5>
                    
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-muted" style="font-size: 0.8rem;">➖ Cantidad:</span>
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-1 fw-bold">
                            {{ $salida->cantidad_salida }}
                        </span>
                    </div>
                    
                    <div class="bg-light p-2 rounded-3 mb-3" style="font-size: 0.85rem;">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Retirado por:</span>
                            <span class="fw-bold text-dark">{{ $salida->encargado_nom }}</span>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('salidas.edit', $salida->id_salida) }}" class="btn btn-sm btn-outline-primary w-100 rounded-pill">Editar</a>
                        <form action="{{ route('salidas.destroy', $salida->id_salida) }}" method="POST" class="w-100">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill" onclick="return confirm('¿Eliminar registro?')">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection