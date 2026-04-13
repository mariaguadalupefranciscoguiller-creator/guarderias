@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Registrar Familiar</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('familiares.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Persona</label>
                            <input type="number" name="id_persona" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">DNI</label>
                            <input type="text" name="DNI" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Parentezco</label>
                            <input type="number" name="id_parentezco" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Niño</label>
                            <input type="number" name="id_ninio" class="form-control" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4" style="background-color: #198754;">Guardar</button>
                            <a href="{{ route('familiares.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection