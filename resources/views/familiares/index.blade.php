@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Lista de Familiares</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('familiares.create') }}" class="btn btn-success mb-3" style="background-color: #198754;">Registrar Familiar</a>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Niño</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($familiares as $familiar)
                    <tr>
                        <td>{{ $familiar->id_familiar }}</td>
                        <td>{{ $familiar->DNI }}</td>
                        <td>{{ $familiar->direccion }}</td>
                        <td>{{ $familiar->id_ninio }}</td>
                        <td>
                            <a href="{{ route('familiares.edit', $familiar->id_familiar) }}" class="btn btn-warning btn-sm fw-bold">Editar</a>
                            <form action="{{ route('familiares.destroy', $familiar->id_familiar) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('¿Eliminar?')">Eliminar</button>
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