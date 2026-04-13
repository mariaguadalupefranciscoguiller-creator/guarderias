@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Registro Diario de Comidas</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('registro_comidas.create') }}" class="btn btn-success mb-3">Nuevo Registro</a>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Niño</th>
                        <th>Plato</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $reg)
                    <tr>
                        <td>{{ $reg->id_ninio }}</td>
                        <td>{{ $reg->id_plato }}</td>
                        <td>{{ $reg->fecha }}</td>
                        <td>{{ $reg->cantidad }}</td>
                        <td>
                            <a href="{{ route('registro_comidas.edit', $reg->id_registro_comida) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('registro_comidas.destroy', $reg->id_registro_comida) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar registro?')">Eliminar</button>
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