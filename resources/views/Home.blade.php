@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Centros</h2>
            <p class="text-secondary small m-0">Gestión de unidades operativas</p>
        </div>
        <a href="{{ route('centros.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nuevo centro
        </a>
    </div>

    <div class="row g-4">
        @foreach($centros as $centro)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $centro->nombre }}</h5>
                                {{-- Estado muy sutil --}}
                                <span class="text-muted small" style="font-size: 0.75rem;">
                                    <i class="bi bi-circle-fill text-success me-1" style="font-size: 0.4rem;"></i> Verificado
                                </span>
                            </div>
                            {{-- Ícono elegante sin fondo de color --}}
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-building fs-3"></i>
                            </div>
                        </div>

                        {{-- Caja de datos en gris muy claro --}}
                        <div class="row text-center py-3" style="background: #fafafa; border-radius: 8px; margin: 0 1px;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Cantidad</small>
                                <span class="h5 fw-bold text-dark mb-0">1</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Suma Total</small>
                                <span class="h5 fw-bold text-dark mb-0">
                                    ${{ number_format($centro->costo, 2) }}
                                </span>
                            </div>
                        </div>

                        {{-- Botón de acción discreto --}}
                        <div class="mt-4">
                            <a href="{{ route('centros.show', $centro->id) }}" class="btn btn-link w-100 text-decoration-none text-secondary fw-bold border" style="font-size: 0.8rem; border-radius: 6px; background: white;">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    /* Efecto de elevación suave */
    .card { transition: all 0.3s ease; }
    .card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.06) !important; }
    
    .btn-link:hover { background: #f8f9fa !important; border-color: #dee2e6 !important; color: #334155 !important; }
</style>
@endsection