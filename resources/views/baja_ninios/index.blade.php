@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        {{-- Encabezado Verde --}}
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Lista de Bajas de Niños</h3>
        </div>

        <div class="card-body">
            <a href="{{ route('baja_ninios.create') }}" class="btn btn-success mb-3" style="background-color: #198754; border: none;">
                Registrar Nueva Baja
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Niño</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bajas as $baja)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            
                            {{-- Nombre en NEGRO y sin subrayado azul --}}
                            <td>
                                <span class="text-dark fw-bold" style="text-decoration: none;">
                                    {{ $baja->nombre_ninio }}
                                </span>
                            </td>
                            
                            <td class="text-muted italic">{{ $baja->motivo }}</td>
                            <td>{{ $baja->fecha }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('baja_ninios.edit', $baja->id_baja) }}" 
                                       class="btn btn-warning btn-sm fw-bold">
                                       Editar
                                    </a>

                                    <form action="{{ route('baja_ninios.destroy', $baja->id_baja) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold" 
                                                onclick="return confirm('¿Seguro que quieres eliminar este registro?')">
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

            @if($bajas->isEmpty())
                <p class="text-center mt-3">No hay registros de bajas disponibles.</p>
            @endif
        </div>
    </div>
</div>
@endsection