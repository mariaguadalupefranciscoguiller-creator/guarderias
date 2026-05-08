@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Lista de Platos</h2>
            <p class="text-secondary small m-0">Catálogo de platillos disponibles para el menú</p>
        </div>
        <a href="{{ route('platos.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Registrar Plato
        </a>
    </div>

    <div class="row g-4">
        @forelse($platos as $plato)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div style="max-width: 80%;">
                                <h5 class="fw-bold text-dark mb-1" style="line-height: 1.3;">{{ $plato->nombre }}</h5>
                                <span class="text-muted small">ID: #{{ $plato->id_plato }}</span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-utensils fs-3"></i>
                            </div>
                        </div>

                        {{-- Cuadro de Precio (Destacado) --}}
                        <div class="row text-center py-3" style="background: #f8fafc; border-radius: 8px; margin: 0 1px; border: 1px dashed #e2e8f0;">
                            <div class="col-12">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Costo Sugerido</small>
                                <span class="h4 fw-bold text-dark mb-0">${{ number_format($plato->precio, 2) }}</span>
                            </div>
                        </div>

                        {{-- Botones de acción discretos --}}
                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('platos.edit', $plato->id_plato) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>
                            <form action="{{ route('platos.destroy', $plato->id_plato) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;" onclick="return confirm('¿Desea eliminar este plato?')">
                                    <i class="bi bi-trash3 me-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay platos registrados en el catálogo.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .card { transition: all 0.3s ease; }
    .card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.06) !important; }
    .btn-link:hover { background: #f8f9fa !important; border-color: #dee2e6 !important; color: #334155 !important; }
</style>
@endsection