@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Editar Datos del Niño</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ninios.update', $ninio->id_ninio) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label fw-bold">Matrícula</label>
                            <input type="text" name="matricula" class="form-control" value="{{ $ninio->matricula }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Registro</label>
                            <input type="date" name="fecha" class="form-control" value="{{ $ninio->fecha }}" required>
                        </div>

                        <div class="mb-3 text-start">
                    <label for="id_persona" class="form-label fw-bold">Seleccionar Persona</label>
                    <select name="id_persona" id="id_persona" class="form-select" required>
                        <option value="" disabled selected>Escoge a la persona...</option>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->id_persona }}">
                                {{ $persona->nombre }} 
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 text-start">
                    <label for="id_centro" class="form-label fw-bold">Asignar a Centro</label>
                    <select name="id_centro" id="id_centro" class="form-select" required>
                        <option value="" disabled selected>Selecciona el centro...</option>
                        @foreach($centros as $centro)
                            <option value="{{ $centro->id_centro }}">
                                {{ $centro->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning px-4 fw-bold" style="background-color: #ffc107; border: none;">
                                Actualizar Datos
                            </button>
                            <a href="{{ route('ninios.index') }}" class="btn btn-secondary px-4">
                                Volver a la Lista
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection