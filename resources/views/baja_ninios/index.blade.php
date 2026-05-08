@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Estilo SaaS --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Bajas de Niños</h2>
            <p class="text-secondary small m-0">Historial de alumnos que han egresado del sistema</p>
        </div>
        <a href="{{ route('baja_ninios.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Registrar Nueva Baja
        </a>
    </div>

    <div class="row g-4">
        @forelse($bajas as $baja)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $baja->nombre_ninio }}</h5>
                                <span class="badge bg-light text-secondary border px-2 py-1" style="font-size: 0.7rem; border-radius: 5px;">
                                    ID Registro: #{{ $baja->id_baja }}
                                </span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-box-arrow-right fs-3"></i>
                            </div>
                        </div>

                        {{-- Motivo de la Baja (Destacado) --}}
                        <div class="mb-4">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 0.6rem; letter-spacing: 0.5px;">Motivo de Salida</small>
                            <p class="text-dark fw-medium mb-0" style="font-size: 0.95rem; line-height: 1.4;">
                                "{{ $baja->motivo }}"
                            </p>
                        </div>

                        {{-- Cuadro de Fecha --}}
                        <div class="py-2 px-3 mb-4" style="background: #fafafa; border-radius: 8px; display: inline-block;">
                            <small class="text-muted fw-bold" style="font-size: 0.7rem;">FECHA DE BAJA:</small>
                            <span class="text-dark fw-bold ms-1" style="font-size: 0.85rem;">
                                {{ date('d/m/Y', strtotime($baja->fecha)) }}
                            </span>
                        </div>

                        {{-- Botones de acción discretos --}}
                        <div class="d-flex gap-2 pt-3 border-top">
                            <a href="{{ route('baja_ninios.edit', $baja->id_baja) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('baja_ninios.destroy', $baja->id_baja) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;" onclick="return confirm('¿Seguro que desea eliminar este registro?')">
                                    <i class="bi bi-trash3 me-1"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="opacity-50 mb-3">
                    <i class="bi bi-archive fs-1"></i>
                </div>
                <p class="text-muted">No hay registros de bajas en el historial.</p>
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