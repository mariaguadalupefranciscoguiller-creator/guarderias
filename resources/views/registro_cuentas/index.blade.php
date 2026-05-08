@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Cuentas Bancarias</h2>
            <p class="text-secondary small m-0">Administración de registros para abonos y pagos</p>
        </div>
        <a href="{{ route('registro_cuentas.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
            + Nueva cuenta
        </a>
    </div>

    <div class="row g-4">
        @forelse($cuentas as $cuenta)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Encabezado de la Tarjeta --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $cuenta->nombre_familiar }}</h5>
                                <span class="text-muted small" style="font-size: 0.75rem;">
                                    <i class="bi bi-circle-fill text-success me-1" style="font-size: 0.4rem;"></i> Cuenta activa
                                </span>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-credit-card-2-back fs-3"></i>
                            </div>
                        </div>

                        {{-- Información en cuadros (Igual que centros) --}}
                        <div class="row text-center py-3" style="background: #fafafa; border-radius: 8px; margin: 0 1px;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">No. Registro</small>
                                <span class="h5 fw-bold text-dark mb-0">{{ $cuenta->id_registro_cuenta }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 0.5px;">Número de Cuenta</small>
                                <span class="h5 fw-bold text-dark mb-0">{{ $cuenta->cuenta }}</span>
                            </div>
                        </div>

                        {{-- Botones de acción discretos --}}
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('registro_cuentas.edit', $cuenta->id_registro_cuenta) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil me-1"></i> Editar
                            </a>
                            <form action="{{ route('registro_cuentas.destroy', $cuenta->id_registro_cuenta) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;" onclick="return confirm('¿Seguro que desea eliminar esta cuenta?')">
                                    <i class="bi bi-trash3 me-1"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay cuentas registradas.</p>
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