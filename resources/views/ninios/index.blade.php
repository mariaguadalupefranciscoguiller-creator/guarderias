@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Listado de Niños</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('ninios.create') }}" class="btn btn-success mb-3">Registrar Nuevo Niño</a>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Matrícula</th>
                        <th>Fecha Ingreso</th>
                        <th>ID Persona</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ninios as $ninio)
                    <tr>
                        <td>{{ $ninio->matricula }}</td>
                        <td>{{ $ninio->fecha }}</td>
                        <td>{{ $ninio->id_persona }}</td>
                        <td>
                            <a href="{{ route('ninios.edit', $ninio->id_ninio) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('ninios.destroy', $ninio->id_ninio) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">Borrar</button>
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