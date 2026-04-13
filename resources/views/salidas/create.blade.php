@extends('layouts.bodega')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold text-center">Registrar Salida de Bodega</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('salidas.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Fecha de Salida</label>
                            <input type="date" name="fecha_salida" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Cantidad a Retirar</label>
                            <input type="number" name="cantidad_salida" class="form-control" placeholder="0" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">ID del Producto</label>
                            <input type="number" name="id_producto" class="form-control" placeholder="Ej. 101" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">ID del Encargado</label>
                            <input type="number" name="id_encargado" class="form-control" placeholder="Ej. 5" required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary fw-bold">Guardar Salida</button>
                            <a href="{{ route('salidas.index') }}" class="btn btn-link text-muted text-decoration-none">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection