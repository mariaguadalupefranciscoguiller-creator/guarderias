@extends('layouts.template')
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
                        @method('PUT') 
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Plato</label>
                            <select name="id_plato" class="form-control" require>
                                <option value="" disabled selected>selecciona un Plato</option>
                                @foreach($platos as $plato)
                                <option value="{{$plato->id_plato}}">{{$plato->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID del Ingrediente</label>
                            <select name="id_ingrediente" class="form-control" require>
                                <option value="" disabled selected>selecciona un Ingrediente</option>
                                @foreach($ingredientes as $ingrediente)
                                <option value="{{$ingrediente->id_ingrediente}}">{{$ingrediente->nombre}}</option>
                                @endforeach
                            </select>
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