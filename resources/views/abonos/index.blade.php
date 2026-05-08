@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera con estilo minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Historial de Abonos</h2>
            <p class="text-secondary small m-0">Registro y seguimiento de pagos individuales</p>
        </div>
        <a href="{{ route('abonos.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nuevo abono
        </a>
    </div>

    <div class="row g-4">
        @forelse($abonos as $abono)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $abono->nombre_ninio }}</h5>
                                <span class="text-muted small" style="font-size: 0.8rem;">
                                    Responsable: {{ $abono->nombre_tutor }}
                                </span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-cash-stack fs-3"></i>
                            </div>
                        </div>

                        {{-- Información principal en cuadros --}}
                        <div class="row text-center py-3" style="background: #fafafa; border-radius: 8px; margin: 0 1px;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Fecha Pago</small>
                                <span class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $abono->fecha }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Monto</small>
                                <span class="h5 fw-bold text-dark mb-0">
                                    ${{ number_format($abono->cantidad, 2) }}
                                </span>
                            </div>
                        </div>

                        {{-- Acciones discretas al pie --}}
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('abonos.edit', $abono->id_abono) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('abonos.destroy', $abono->id_abono) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;" onclick="return confirm('¿Eliminar registro?')">
                                    <i class="bi bi-trash3 me-1"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi- receipt text-muted fs-1 opacity-25"></i>
                <p class="text-muted mt-3">No hay abonos registrados en este momento.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    /* Efecto hover consistente con Centros */
    .card { transition: all 0.3s ease; }
    .card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.06) !important; }
    
    .btn-link:hover { background: #f8f9fa !important; border-color: #dee2e6 !important; color: #334155 !important; }
</style>
@endsection