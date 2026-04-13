@extends('layouts.bodega')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Entrada de Mercancía</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('entradas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Entrada</label>
                            <input type="date" name="fecha_entrada" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad_entrada" class="form-control" placeholder="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Producto</label>
                            <input type="number" name="id_producto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Encargado</label>
                            <input type="number" name="id_encargado" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('entradas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success px-4">Guardar Entrada</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection