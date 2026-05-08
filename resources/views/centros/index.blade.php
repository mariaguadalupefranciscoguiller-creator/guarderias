@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Centros</h2>
            <p class="text-secondary small m-0">Listado de unidades registradas en el sistema</p>
        </div>
        <a href="{{ route('centros.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nuevo centro
        </a>
    </div>

    <div class="row g-4">
        @forelse($centros as $centro)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-body p-4">
                        
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $centro->nombre }}</h5>
                                {{-- Estado discreto --}}
                                <span class="text-muted small"><i class="bi bi-circle-fill text-success me-1" style="font-size: 0.5rem;"></i> Activo</span>
                            </div>
                            {{-- Icono en gris suave --}}
                            <div class="text-secondary opacity-50">
                                <i class="bi bi-building fs-4"></i>
                            </div>
                        </div>

                        <div class="row text-center py-3" style="background: #fafafa; border-radius: 8px;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">ID Registro</small>
                                <span class="h5 fw-bold text-dark mb-0">{{ $centro->id_centro }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Costo Base</small>
                                <span class="h5 fw-bold text-dark mb-0">${{ number_format($centro->costo, 2) }}</span>
                            </div>
                        </div>

                        {{-- Botones sutiles --}}
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('centros.edit', $centro->id_centro) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('centros.destroy', $centro->id_centro) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px;" onclick="return confirm('¿Seguro que desea eliminar este centro?')">
                                    <i class="bi bi-trash3 me-1"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay centros para mostrar.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    /* Efecto hover muy sutil */
    .card { transition: all 0.3s ease; border: 1px solid #edf2f7 !important; }
    .card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    
    /* Ajuste de botones para que no parezcan de IA */
    .btn-link { background: #fff; }
    .btn-link:hover { background: #f8f9fa; color: #333 !important; }
</style>
@endsection