@extends('layouts.bodega')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Registro de Salida</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('salidas.update', $salida->id_salida) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Salida</label>
                            <input type="date" name="fecha_salida" class="form-control" 
                                   value="{{ $salida->fecha_salida }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad_salida" class="form-control" 
                                   value="{{ $salida->cantidad_salida }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Producto</label>
                            <input type="number" name="id_producto" class="form-control" 
                                   value="{{ $salida->id_producto }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Encargado</label>
                            <input type="number" name="id_encargado" class="form-control" 
                                   value="{{ $salida->id_encargado }}" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('salidas.index') }}" class="btn btn-outline-secondary">Volver</a>
                            <button type="submit" class="btn btn-primary px-4">Actualizar Salida</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection