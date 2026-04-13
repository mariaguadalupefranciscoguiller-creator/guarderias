@extends('layouts.app')

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
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Ingrediente</label>
                            <input type="number" name="id_ingrediente" class="form-control" value="{{ $alergia->id_ingrediente }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Niño</label>
                            <input type="number" name="id_ninio" class="form-control" value="{{ $alergia->id_ninio }}" required>
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