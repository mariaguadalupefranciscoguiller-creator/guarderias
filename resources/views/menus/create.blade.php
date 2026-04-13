@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Registrar Menú</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('menus.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Plato</label>
                            <input type="number" name="id_plato" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Ingrediente</label>
                            <input type="number" name="id_ingrediente" class="form-control" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('menus.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection