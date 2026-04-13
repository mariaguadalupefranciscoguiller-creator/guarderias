@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h4 class="mb-0 fw-bold">Menú Principal de Bodega</h4>
                </div>
                <div class="card-body p-4 text-center">
                    <p class="text-muted mb-4">Seleccione el módulo que desea gestionar actualmente:</p>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('encargados.index') }}" class="btn btn-success w-100 py-3 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-people-fill d-block mb-2"></i>
                                Gestionar Encargados
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('entradas.index') }}" class="btn btn-primary w-100 py-3 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-box-seam d-block mb-2"></i>
                                Registro de Entradas
                            </a>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-grid mt-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm">
                            Cerrar Sesión / Salir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection