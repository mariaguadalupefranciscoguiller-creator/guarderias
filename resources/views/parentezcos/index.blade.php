@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Parentescos</h2>
            <p class="text-secondary small m-0">Tipos de relación familiar registrados</p>
        </div>
        <a href="{{ route('parentezcos.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Registrar Nuevo
        </a>
    </div>

    <div class="row g-4">
        @forelse($parentezcos as $parentezco)
            <div class="col-12 col-md-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4 text-center">
                        
                        {{-- Icono representativo sutil --}}
                        <div class="text-secondary opacity-25 mb-3">
                            <i class="bi bi-diagram-2 fs-2"></i>
                        </div>

                        {{-- Nombre del Parentesco --}}
                        <h5 class="fw-bold text-dark mb-1">{{ $parentezco->nombre }}</h5>
                        <p class="text-muted small mb-4">ID: #{{ $parentezco->id_parentezco }}</p>

                        {{-- Botones de acción --}}
                        <div class="d-flex gap-2 border-top pt-3">
                            <a href="{{ route('parentezcos.edit', $parentezco->id_parentezco) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('parentezcos.destroy', $parentezco->id_parentezco) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;" onclick="return confirm('¿Eliminar parentesco?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay parentescos registrados.</p>
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