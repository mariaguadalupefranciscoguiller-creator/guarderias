@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold text-dark mb-0">🗂️ Categorías</h2>
            <small class="text-muted">Hotel Loto Azul</small>
        </div>
        <a href="{{ route('categorias.create') }}" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm fw-bold">
            + Nueva
        </a>
    </div>

    <div class="row g-3">
        @foreach($categorias as $categoria)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; overflow: hidden;">
                <div class="card-body p-3 text-center">
                    
                    <div class="bg-success-subtle rounded-circle d-inline-flex p-3 mb-2">
                        <span class="fs-4">🏷️</span>
                    </div>

                    <h5 class="fw-bold text-dark mb-1">{{ $categoria->nombre_categoria }}</h5>
                    <div class="mb-3">
                        <span class="badge bg-light text-success border border-success-subtle rounded-pill" style="font-size: 0.7rem;">
                            ID: #{{ $categoria->id_categoria }}
                        </span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" 
                           class="btn btn-sm btn-outline-warning w-100 fw-bold rounded-pill">
                           Editar
                        </a>
                        
                        <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 fw-bold rounded-pill" 
                                    onclick="return confirm('¿Eliminar?')">
                                Borrar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4 mb-4">
        <a href="{{ url('/menu-principal') }}" class="btn btn-sm btn-dark rounded-pill px-4 shadow">
            ← Volver
        </a>
    </div>
</div>

<style>
    .card { transition: transform 0.2s; }
    .card:hover { transform: scale(1.02); }
</style>
@endsection