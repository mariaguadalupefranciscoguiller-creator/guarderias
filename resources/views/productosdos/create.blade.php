@extends('layouts.bodega')

@section('title', 'Agregar Nuevo Producto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrar Nuevo Producto</h4>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('productosdos.store') }}" method="POST">
                        @csrf <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                            placeholder="Ej: Martillo de acero" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad_existencia" class="form-label fw-bold">Cantidad en Existencia</label>
                                <input type="number" name="cantidad_existencia" id="cantidad_existencia" 
                                class="form-control" value="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="unidad_medida" class="form-label fw-bold">Unidad de Medida</label>
                                <select name="unidad_medida" id="unidad_medida" class="form-select" required>
                                    <option value="Pieza">Pieza</option>
                                    <option value="Kilo">Kilo</option>
                                    <option value="Litro">Litro</option>
                                    <option value="Caja">Caja</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fecha_entrada" class="form-label fw-bold">Fecha de Entrada</label>
                                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control"
                                 value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_categoria" class="form-label fw-bold">Categoría (ID)</label>
                                <input type="number" name="id_categoria" id="id_categoria" class="form-control" 
                                placeholder="Ej: 1" required>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('productosdos.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                            Guardar Producto
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection