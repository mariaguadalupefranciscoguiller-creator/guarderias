@extends('layouts.template') {{-- Esto le dice que use el cascarón que ya tienes --}}

@section('content')
<div class="container-fluid">
    <div class="text-center mb-5 mt-2">
        <h1 class="display-5 fw-bold text-dark">Panel Administrativo</h1>
        <p class="text-muted fs-5">Gestión de alumnos, familiares y control escolar</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 p-3 text-center" style="border-radius: 15px;">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <i class="bi bi-person-badge-fill text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h3 class="fw-bold mb-2">Niños</h3>
                    <p class="text-muted small flex-grow-1">Registro de alumnos y expedientes.</p>
                    <a href="{{ url('/ninios') }}" class="btn btn-success w-100 py-2 fw-bold mt-3">Entrar</a>
                </div>
            </div>
        </div>
        
        </div>
</div>
@endsection