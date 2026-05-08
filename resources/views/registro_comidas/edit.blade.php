@extends('layouts.template')

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
                        @method('PUT') 
                        <div class="mb-3 text-start">
                            <label for="id_ninio" class="form-label fw-bold">Niño</label>
                            <select name="id_ninio" id="id_ninio" class="form-select" required>
                                <option value="" disabled selected>Selecciona al niño...</option>
                                @foreach($ninios as $ninio)
                                    <option value="{{ $ninio->id_ninio }}">
                                        {{ $ninio->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Selector para el Plato --}}
                        <div class="mb-3 text-start">
                            <label for="id_plato" class="form-label fw-bold">Plato del Menú</label>
                            <select name="id_plato" id="id_plato" class="form-select" required>
                                <option value="" disabled selected>Selecciona el plato...</option>
                                @foreach($platos as $plato)
                                    <option value="{{ $plato->id_plato }}">
                                        {{ $plato->nombre }}
                                    </option>
                                @endforeach
                            </select>
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