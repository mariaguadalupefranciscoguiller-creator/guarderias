@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Lista de Alergias</h2>
            <p class="text-secondary small m-0">Control de restricciones alimentarias por alumno</p>
        </div>
        <a href="{{ route('alergias.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Registrar Alergia
        </a>
    </div>

    <div class="row g-4">
        @forelse($alergias as $alergia)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $alergia->nombre_ninio }}</h5>
                                <span class="text-danger small fw-bold">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Alergia Detectada
                                </span>
                            </div>
                            <div class="text-danger opacity-25">
                                <i class="bi bi-virus fs-3"></i>
                            </div>
                        </div>

                        {{-- Información del Ingrediente en cuadro --}}
                        <div class="py-3 text-center" style="background: #fff5f5; border-radius: 8px; border: 1px solid #fee2e2;">
                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Restricción / Ingrediente</small>
                            <span class="h5 fw-bold text-danger mb-0">{{ $alergia->nombre_ingrediente }}</span>
                        </div>

                        <div class="mt-2 text-center">
                            <small class="text-muted">ID Registro: #{{ $alergia->id_alergia }}</small>
                        </div>

                        {{-- Botones de acción discretos --}}
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('alergias.edit', $alergia->id_alergia) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('alergias.destroy', $alergia->id_alergia) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;" onclick="return confirm('¿Eliminar registro de alergia?')">
                                    <i class="bi bi-trash3 me-1"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay alergias registradas.</p>
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