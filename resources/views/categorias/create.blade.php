@extends('layouts.loto_template')

@section('title', 'Agregar Nueva Categoría')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"> <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Nueva Categoría</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <label for="nombre_categoria" class="form-label fw-bold">Nombre de la Categoría</label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" 
                                   class="form-control" 
                                   placeholder="Ej: Abarrotes, Limpieza, Herramientas" 
                                   required>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                Guardar Categoría
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection