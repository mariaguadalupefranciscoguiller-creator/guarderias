@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Gestión de Menús</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('menus.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    Nuevo Registro
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Menú</th>
                            <th>ID Plato</th>
                            <th>ID Ingrediente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td class="fw-bold">{{ $menu->id_menu }}</td>
                            
                            <td>{{ $menu->nombre_plato }}</td>
                            <td>{{ $menu->nombre_ingrediente }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('menus.edit', $menu->id_menu) }}" 
                                       class="btn btn-warning btn-sm fw-bold shadow-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm" 
                                                onclick="return confirm('¿Desea eliminar este menú?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection