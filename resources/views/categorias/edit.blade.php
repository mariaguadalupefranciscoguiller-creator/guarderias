@extends('layouts.loto_template')

@section('title', 'Editar Categoría')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-dark"> <h4 class="mb-0">Editar Categoría: {{ $categoria->nombre_categoria }}</h4>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="POST">
                        @csrf 
                        @method('PUT') <div class="mb-4">
                            <label for="nombre_categoria" class="form-label fw-bold">Nombre de la Categoría</label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" 
                                   class="form-control" 
                                   value="{{ $categoria->nombre_categoria }}" 
                                   required>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary">
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