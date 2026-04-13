@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Editar Registro de Menú</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('menus.update', $menu->id_menu) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label fw-bold">ID del Plato</label>
                            <input type="number" name="id_plato" class="form-control" value="{{ $menu->id_plato }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Ingrediente</label>
                            <input type="number" name="id_ingrediente" class="form-control" value="{{ $menu->id_ingrediente }}" required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning px-4 fw-bold" style="background-color: #ffc107; border: none;">
                                Actualizar
                            </button>
                            <a href="{{ route('menus.index') }}" class="btn btn-secondary px-4">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection