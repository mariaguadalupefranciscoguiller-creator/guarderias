@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Lista de Personas</h2>
            <p class="text-secondary small m-0">Registro general de usuarios y beneficiarios</p>
        </div>
        <a href="{{ route('personas.create') }}" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px;">
            + Registrar Persona
        </a>
    </div>

    <div class="row g-4">
        @forelse($personas as $persona)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                    <div class="card-body p-4">
                        
                        {{-- Nombre y Apellidos Corregidos --}}
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-1">{{ $persona->nombre }}</h5>
                                <p class="text-secondary small mb-0">
                                    {{-- Usamos los nombres exactos de tu DB --}}
                                    {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}
                                </p>
                            </div>
                            <div class="text-secondary opacity-25">
                                <i class="bi bi-person-bounding-box fs-3"></i>
                            </div>
                        </div>

                        {{-- Cuadro de Datos con Fecha Corregida --}}
                        <div class="row text-center py-3" style="background: #fafafa; border-radius: 8px; margin: 0 1px;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem;">ID SISTEMA</small>
                                <span class="fw-bold text-dark">#{{ $persona->id_persona }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.6rem;">NACIMIENTO</small>
                                <span class="fw-bold text-dark" style="font-size: 0.85rem;">
                                    {{-- Usamos 'fecha_nacimiento' como sale en tu tabla --}}
                                    {{ $persona->fecha_nacimiento ? date('d/m/Y', strtotime($persona->fecha_nacimiento)) : 'Sin fecha' }}
                                </span>
                            </div>
                        </div>

                        {{-- Acciones --}}
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('personas.edit', $persona->id_persona) }}" class="btn btn-link flex-grow-1 text-decoration-none text-secondary fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('personas.destroy', $persona->id_persona) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link w-100 text-decoration-none text-danger fw-bold border" style="font-size: 0.85rem; border-radius: 6px; background: white;" onclick="return confirm('¿Eliminar registro?')">
                                    <i class="bi bi-trash3"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay personas registradas.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection