@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Editar Registro de Comida</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('registro_comidas.update', $registro->id_registro_comida) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label fw-bold">ID del Niño</label>
                            <input type="number" name="id_ninio" class="form-control" value="{{ $registro->id_ninio }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Plato</label>
                            <input type="number" name="id_plato" class="form-control" value="{{ $registro->id_plato }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="{{ $registro->fecha }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" value="{{ $registro->cantidad }}" required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning px-4 fw-bold" style="background-color: #ffc107; border: none;">
                                Actualizar Registro
                            </button>
                            <a href="{{ route('registro_comidas.index') }}" class="btn btn-secondary px-4">
                                Volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection