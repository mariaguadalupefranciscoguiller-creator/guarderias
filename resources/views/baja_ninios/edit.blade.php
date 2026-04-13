@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                {{-- Encabezado en color amarillo/naranja para indicar edición --}}
                <div class="card-header text-dark fw-bold text-center" style="background-color: #ffc107;">
                    <h4 class="mb-0">Editar Registro de Baja #{{ $baja->id_baja }}</h4>
                </div>
                
                <div class="card-body p-4">
                    {{-- IMPORTANTE: La ruta lleva el ID del registro que queremos modificar --}}
                    <form action="{{ route('baja_ninios.update', $baja->id_baja) }}" method="POST">
                        @csrf {{-- Token de seguridad --}}
                        @method('PUT') {{-- Indica a Laravel que es una actualización --}}
                        
                        {{-- Campo ID del Niño --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Niño</label>
                            <input type="number" name="id_ninio" class="form-control" value="{{ $baja->id_ninio }}" required>
                        </div>

                        {{-- Campo Motivo --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Motivo de la Baja</label>
                            <textarea name="motivo" class="form-control" rows="3" required>{{ $baja->motivo }}</textarea>
                        </div>

                        {{-- Campo Fecha --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="{{ $baja->fecha }}" required>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning px-4 fw-bold" style="border: none;">
                                Actualizar Datos
                            </button>
                            <a href="{{ route('baja_ninios.index') }}" class="btn btn-secondary px-4">
                                Volver a la Lista
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="alert alert-warning mt-3 shadow-sm">
                <small><strong>Aviso:</strong> Los cambios realizados se verán reflejados inmediatamente en la lista de bajas de la **Unidad 3**.</small>
            </div>
        </div>
    </div>
</div>
@endsection