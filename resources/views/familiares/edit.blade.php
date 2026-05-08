@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Editar Familiar</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('familiares.update', $familiar->id_familiar) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold">DNI</label>
                            <input type="text" name="DNI" class="form-control" value="{{ $familiar->DNI }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control" value="{{ $familiar->direccion }}" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning px-4" style="background-color: #ffc107; border:none;">Actualizar</button>
                            <a href="{{ route('familiares.index') }}" class="btn btn-secondary px-4">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection