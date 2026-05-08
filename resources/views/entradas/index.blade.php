@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">📥 Registro de Entradas</h2>
            <p class="text-muted">Movimientos de bodega - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('entradas.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm fw-bold">
            + Nueva Entrada
        </a>
    </div>

    <div class="row g-3">
        @foreach($entradas as $entrada)
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-success-subtle text-success rounded-pill">ID: #{{ $entrada->id_entrada }}</span>
                        <small class="text-muted">📅 {{ $entrada->fecha_entrada }}</small>
                    </div>
                    
                    <h5 class="fw-bold text-dark mb-1">{{ $entrada->producto_nom }}</h5>
                    
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-muted" style="font-size: 0.8rem;">➕ Cantidad:</span>
                        <span class="badge bg-info text-white rounded-pill px-3 py-1 fw-bold">
                            {{ $entrada->cantidad_entrada }}
                        </span>
                    </div>
                    
                    <div class="bg-light p-2 rounded-3 mb-3" style="font-size: 0.85rem;">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Responsable:</span>
                            <span class="fw-bold text-dark">{{ $entrada->encargado_nom }}</span>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('entradas.edit', $entrada->id_entrada) }}" class="btn btn-sm btn-outline-warning w-100 rounded-pill">Editar</a>
                        <form action="{{ route('entradas.destroy', $entrada->id_entrada) }}" method="POST" class="w-100">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill" onclick="return confirm('¿Borrar?')">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection