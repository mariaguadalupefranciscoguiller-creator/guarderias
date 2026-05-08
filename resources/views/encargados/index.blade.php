@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">👥 Equipo de Encargados</h2>
            <p class="text-muted">Personal responsable de movimientos - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('encargados.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">
            + Nuevo Encargado
        </a>
    </div>

    <div class="row g-3">
        @foreach($encargados as $enc)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; transition: transform 0.2s;">
                <div class="card-body p-4 text-center">
                    
                    <div class="mb-3">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                            ID: #{{ $enc->id_encargado }}
                        </span>
                    </div>

                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span style="font-size: 2.5rem;">👤</span>
                    </div>

                    <h5 class="fw-bold text-dark mb-1">{{ $enc->nombre }}</h5>
                    <p class="text-muted small mb-3">
                        {{ $enc->apellido_paterno }} {{ $enc->apellido_materno }}
                    </p>

                    <div class="bg-primary-subtle p-2 rounded-3 mb-4">
                        <span class="small fw-bold text-primary text-uppercase">Responsable Autorizado</span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('encargados.edit', $enc->id_encargado) }}" 
                           class="btn btn-sm btn-outline-warning w-100 fw-bold rounded-pill">
                           Editar
                        </a>
                        
                        <form action="{{ route('encargados.destroy', $enc->id_encargado) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 fw-bold rounded-pill" 
                                    onclick="return confirm('¿Retirar a este encargado?')">
                                Borrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5 mb-5">
        <a href="{{ url('/menu-principal') }}" class="btn btn-dark rounded-pill px-5 shadow">
            ← Volver al Panel
        </a>
    </div>
</div>

<style>
    .card:hover { transform: translateY(-5px); }
</style>
@endsection