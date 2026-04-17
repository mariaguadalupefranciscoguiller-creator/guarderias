@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card shadow-lg border-0">
            {{-- Encabezado verde igual al de Abonos --}}
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Lista de Familiares</h4>
            </div>
            
            <div class="p-3">
                <a class="btn btn-success px-4" href="{{ route('familiares.create') }}">
                    + Registrar Familiar
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Dirección</th>
                                <th>Familiar</th>
                                <th>Parentesco</th>
                                <th>Niño</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($familiares as $familiar)
    <tr>
        <td class="fw-bold">#{{ $familiar->id_familiar }}</td>
        <td>{{ $familiar->DNI }}</td>
        <td class="text-start">{{ $familiar->direccion }}</td>
        
        {{-- Quitamos los cuadritos (badge) para que sea texto limpio --}}
        <td>{{ $familiar->nombre_familiar }}</td>
        
        {{-- Ahora usamos el alias que definimos en el controlador --}}
        <td>{{ $familiar->parentezco_texto }}</td>
        
        <td class="text-primary fw-bold">{{ $familiar->nombre_ninio }}</td>

        <td>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('familiares.edit', $familiar->id_familiar) }}" 
                   class="btn btn-sm btn-warning">Editar</a>
                
                <form action="{{ route('familiares.destroy', $familiar->id_familiar) }}" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">
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

            <div class="card-footer bg-light text-start">
                <a href="{{ route('menu.principal') }}" class="btn btn-outline-secondary btn-sm">
                    ← Volver al Menú
                </a>
            </div>
        </div>
    </div>
</div>
@endsection