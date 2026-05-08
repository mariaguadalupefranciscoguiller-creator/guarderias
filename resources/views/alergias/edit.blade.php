@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Alergia #{{ $alergia->id_alergia }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('alergias.update', $alergia->id_alergia) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body p-4">
                    <form action="{{ route('alergias.store') }}" method="POST">
                        @csrf
                    {{-- Selector para el Ingrediente --}}
                    <div class="mb-3 text-start">
                        <label for="id_ingrediente" class="form-label fw-bold">Ingrediente</label>
                        <select name="id_ingrediente" id="id_ingrediente" class="form-select" required>
                            <option value="" disabled selected>Selecciona el ingrediente...</option>
                            @foreach($ingredientes as $ingrediente)
                                <option value="{{ $ingrediente->id_ingrediente }}">
                                    {{ $ingrediente->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Selector para el Niño --}}
                    <div class="mb-3 text-start">
                        <label for="id_ninio" class="form-label fw-bold">Niño con la alergia</label>
                        <select name="id_ninio" id="id_ninio" class="form-select" required>
                            <option value="" disabled selected>Selecciona al niño...</option>
                            @foreach($ninios as $ninio)
                                <option value="{{ $ninio->id_ninio }}">
                                    {{ $ninio->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar Cambios</button>
                            <a href="{{ route('alergias.index') }}" class="btn btn-outline-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection