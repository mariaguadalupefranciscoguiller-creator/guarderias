@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Registro Diario de Comidas</h2>
            <p class="text-secondary small m-0">Seguimiento de alimentación por alumno</p>
        </div>
        <a href="{{ route('registro_comidas.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nuevo Registro
        </a>
    </div>

    <div class="row g-4">
        @forelse($registros as $registro)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $registro->nombre_ninio }}</h5>
                                <span class="text-muted small">
                                    <i class="bi bi-calendar3 me-1"></i> {{ date('d/m/Y', strtotime($registro->fecha)) }}
                                </span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-receipt fs-3"></i>
                            </div>
                        </div>

                        {{-- Información del Plato --}}
                        <div class="mb-4">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.6rem; letter-spacing: 0.5px;">Plato Servido</small>
                            <p class="text-dark fw-bold mb-0" style="font-size: 1rem; line-height: 1.2;">
                                {{ $registro->nombre_plato }}
                            </p>
                        </div>

                        {{-- Cuadro de Cantidad (Estilo Contador) --}}
                        <div class="py-2 px-3 mb-4 d-inline-flex align-items-center" style="background: #f0fdf4; border-radius: 20px; border: 1px solid #dcfce7;">
                            <small class="text-success fw-bold text-uppercase me-2" style="font-size: 0.65rem;">Porciones:</small>
                            <span class="badge bg-success rounded-circle px-2" style="font-size: 0.8rem;">{{ $registro->cantidad }}</span>
                        </div>

                        {{-- Acciones --}}
                        <div class="d-flex gap-2 pt-3 border-top">
                            <a href="{{ route('registro_comidas.edit', $registro->id_registro_comida) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('registro_comidas.destroy', $registro->id_registro_comida) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;" onclick="return confirm('¿Borrar registro?')">
                                    <i class="bi bi-trash3 me-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted small">No se han registrado comidas el día de hoy.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .card { transition: all 0.3s ease; }
    .card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.06) !important; }
    .btn-link:hover { background: #f8f9fa !important; border-color: #dee2e6 !important; }
</style>
@endsection