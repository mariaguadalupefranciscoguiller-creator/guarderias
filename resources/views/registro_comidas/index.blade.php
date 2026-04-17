@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Registro Diario de Comidas</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('registro_comidas.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    Nuevo Registro
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th> <th>Niño</th>
                            <th>Plato</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr>
                            <td class="fw-bold">{{ $registro->id_registro_comida }}</td>
                            
                            <td class="text-dark">{{ $registro->nombre_ninio }}</td>
                            
                            <td>{{ $registro->nombre_plato }}</td>
                            
                            <td>{{ $registro->fecha }}</td>
                            
                            <td class="fw-bold">{{ $registro->cantidad }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('registro_comidas.edit', $registro->id_registro_comida) }}" 
                                       class="btn btn-warning btn-sm fw-bold shadow-sm">Editar</a>
                                    
                                    <form action="{{ route('registro_comidas.destroy', $registro->id_registro_comida) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm" 
                                                onclick="return confirm('¿Borrar registro?')">Eliminar</button>
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