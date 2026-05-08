@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Registrar Consumo de Alimentos</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('registro_comidas.store') }}" method="POST">
                        @csrf
                        {{-- Selector para el Niño --}}
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

                        {{-- Los campos de Fecha y Cantidad se quedan igual --}}
                        <div class="mb-3 text-start">
                            <label for="fecha" class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="cantidad" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" placeholder="Ej: 1" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('registro_comidas.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection