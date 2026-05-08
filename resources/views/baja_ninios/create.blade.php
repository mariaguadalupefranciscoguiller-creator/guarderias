@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                {{-- Encabezado con el color verde de tu sistema --}}
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Registrar Nueva Baja de Niño</h4>
                </div>
                
                <div class="card-body p-4">
                    {{-- La ruta debe ser baja_ninios.store --}}
                    <form action="{{ route('baja_ninios.store') }}" method="POST">
                        @csrf {{-- Token de seguridad obligatorio --}}
                        
                        <div class="mb-3 text-start">
                            <label for="id_ninio" class="form-label fw-bold">Seleccionar Niño</label>
                            <select name="id_ninio" id="id_ninio" class="form-select" required>
                                <option value="" disabled selected>Selecciona al niño que se dará de baja...</option>
                                @foreach($ninios as $ninio)
                                    <option value="{{ $ninio->id_ninio }}">
                                        {{ $ninio->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Motivo de la Baja</label>
                            <textarea name="motivo" class="form-control" rows="3" placeholder="Explique la razón de la baja..." required></textarea>
                        </div>

                        {{-- Campo para la Fecha --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Registro</label>
                            <input type="date" name="fecha" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4 fw-bold" style="background-color: #198754; border: none;">
                                Guardar Registro
                            </button>
                            <a href="{{ route('baja_ninios.index') }}" class="btn btn-secondary px-4">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            {{-- Nota de ayuda para el estudiante --}}
            <div class="alert alert-info mt-3 shadow-sm">
                <small><strong>Nota:</strong> Asegúrate de que el ID del niño ya exista en la tabla de alumnos para evitar errores de llave foránea.</small>
            </div>
        </div>
    </div>
</div>
@endsection