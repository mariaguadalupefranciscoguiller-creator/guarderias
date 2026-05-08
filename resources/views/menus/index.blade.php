@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Gestión de Menús</h2>
            <p class="text-secondary small m-0">Planificación de alimentos y platos principales</p>
        </div>
        <a href="{{ route('menus.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nuevo Registro
        </a>
    </div>

    <div class="row g-4">
        @forelse($menus as $menu)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div style="max-width: 80%;">
                                <h5 class="fw-bold text-dark mb-1" style="line-height: 1.3;">{{ $menu->nombre_plato }}</h5>
                                <span class="text-muted small" style="font-size: 0.75rem;">
                                    Registro No. {{ $menu->id_menu }}
                                </span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-egg-fried fs-3"></i>
                            </div>
                        </div>

                        {{-- Cuadro de Ingrediente (Estilo Cocina) --}}
                        <div class="py-3 text-center" style="background: #fffaf0; border-radius: 8px; border: 1px solid #fef3c7;">
                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Ingrediente Base</small>
                            <span class="h6 fw-bold text-dark mb-0">{{ $menu->nombre_ingrediente }}</span>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('menus.edit', $menu->id_menu) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>
                            <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;" onclick="return confirm('¿Desea eliminar este menú?')">
                                    <i class="bi bi-trash3 me-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay menús registrados actualmente.</p>
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