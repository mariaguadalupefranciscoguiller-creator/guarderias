@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Lista de Alergias</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('alergias.create') }}" class="btn btn-success mb-3" style="background-color: #198754;">
                Registrar
            </a>

            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Ingrediente</th>
                        <th>ID Niño</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alergias as $alergia)
                    <tr class="align-middle">
                        <td class="fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $alergia->id_ingrediente }}</td>
                        <td>{{ $alergia->id_ninio }}</td>
                        <td>
                            <a href="{{ route('alergias.edit', $alergia->id_alergia) }}" 
                               class="btn btn-warning btn-sm fw-bold mb-1" style="background-color: #ffc107; border: none;">
                               Editar
                            </a>
                            <br>
                            <form action="{{ route('alergias.destroy', $alergia->id_alergia) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold" 
                                        style="background-color: #dc3545; border: none;"
                                        onclick="return confirm('¿Desea eliminar este registro?')">
                                    Eliminar
                                </button>
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