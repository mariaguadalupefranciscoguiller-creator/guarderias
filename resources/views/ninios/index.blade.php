@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Listado de Niños</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('ninios.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    + Registrar Nuevo Niño
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Matrícula</th>
                            <th>ID Niño</th>
                            <th>Fecha Ingreso</th>
                            <th>ID Persona</th>
                            <th>ID Centro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ninios as $ninio)
                        <tr>
                            <td class="fw-bold">{{ $ninio->id_ninio }}</td>
                            <td>#{{ $ninio->matricula }}</td>
                            <td class="text-dark fw-bold">{{ $ninio->nombre_ninio }}</td>
                            <td>{{ $ninio->fecha }}</td>
                            
                            <td>{{ $ninio->nombre_ninio }}</td>
                            
                            <td>{{ $ninio->nombre_centro }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('ninios.edit', $ninio->id_ninio) }}" class="btn btn-warning btn-sm fw-bold shadow-sm">
                                       Editar
                                    </a>

                                    <form action="{{ route('ninios.destroy', $ninio->id_ninio) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm" onclick="return confirm('¿Borrar registro?')">
                                            Borrar
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