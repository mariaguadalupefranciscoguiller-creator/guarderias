@extends('layouts.loto_template')

@section('title', 'Editar Producto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Producto: {{ $productodos->nombre }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('productosdos.update', ['productosdo' => $productodos->id_producto]) }}" method="POST">
                    
                        @csrf 
                        @method('PUT') 

                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" 
                                   value="{{ $productodos->nombre }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad_existencia" class="form-label fw-bold">Cantidad en Existencia</label>
                                <input type="number" name="cantidad_existencia" id="cantidad_existencia" class="form-control" 
                                       value="{{ $productodos->cantidad_existencia }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="unidad_medida" class="form-label fw-bold">Unidad de Medida</label>
                                <select name="unidad_medida" id="unidad_medida" class="form-select" required>
                                    <option value="Pieza" {{ $productodos->unidad_medida == 'Pieza' ? 'selected' : '' }}>Pieza</option>
                                    <option value="Kilo" {{ $productodos->unidad_medida == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                    <option value="Litro" {{ $productodos->unidad_medida == 'Litro' ? 'selected' : '' }}>Litro</option>
                                    <option value="Caja" {{ $productodos->unidad_medida == 'Caja' ? 'selected' : '' }}>Caja</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fecha_entrada" class="form-label fw-bold">Fecha de Entrada</label>
                                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" 
                                       value="{{ $productodos->fecha_entrada }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_categoria" class="form-label fw-bold">Categoría (ID)</label>
                                <input type="number" name="id_categoria" id="id_categoria" class="form-control" 
                                       value="{{ $productodos->id_categoria }}" required>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('productosdos.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">
                                Actualizar Cambios
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection