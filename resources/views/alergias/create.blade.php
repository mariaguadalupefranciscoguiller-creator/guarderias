@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Nueva Alergia</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('alergias.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Ingrediente</label>
                            <input type="number" name="id_ingrediente" class="form-control" placeholder="Ej: 5" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Niño</label>
                            <input type="number" name="id_ninio" class="form-control" placeholder="Ej: 12" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Guardar Registro</button>
                            <a href="{{ route('alergias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection