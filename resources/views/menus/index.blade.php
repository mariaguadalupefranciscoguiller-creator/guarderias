@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Gestión de Menús</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('menus.create') }}" class="btn btn-success mb-3">Nuevo Registro</a>
            <table class="table table-bordered text-center">
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
                        <td>{{ $menu->id_menu }}</td>
                        <td>{{ $menu->id_plato }}</td>
                        <td>{{ $menu->id_ingrediente }}</td>
                        <td>
                            <a href="{{ route('menus.edit', $menu->id_menu) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection