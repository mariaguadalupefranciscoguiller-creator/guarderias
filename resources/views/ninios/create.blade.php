@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Inscribir Niño</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ninios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Matrícula</label>
                            <input type="text" name="matricula" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Registro</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Persona</label>
                            <input type="number" name="id_persona" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Centro</label>
                            <input type="number" name="id_centro" class="form-control" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('ninios.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection