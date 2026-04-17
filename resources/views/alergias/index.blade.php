@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Lista de Alergias</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('alergias.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    Registrar
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Ingrediente</th>
                            <th>Niño</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alergias as $alergia)
                        <tr>
                            <td class="fw-bold">{{ $alergia->id_alergia }}</td>
                            
                            <td>{{ $alergia->nombre_ingrediente }}</td>
                            
                            <td class="text-dark fw-bold">{{ $alergia->nombre_ninio }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('alergias.edit', $alergia->id_alergia) }}" 
                                       class="btn btn-warning btn-sm fw-bold">Editar</a>
                                    
                                    <form action="{{ route('alergias.destroy', $alergia->id_alergia) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold" 
                                                onclick="return confirm('¿Eliminar registro?')">Eliminar</button>
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