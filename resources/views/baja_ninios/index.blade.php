@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Lista de Bajas de Niños</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('baja_ninios.create') }}" class="btn btn-success mb-3" style="background-color: #198754;">
                Registrar Nueva Baja
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Niño</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- USAMOS $bajas PORQUE ASÍ LO MANDAMOS DESDE EL CONTROLADOR --}}
                        @foreach($bajas as $baja)
                        <tr class="align-middle">
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td>{{ $baja->id_ninio }}</td>
                            <td>{{ $baja->motivo }}</td>
                            <td>{{ $baja->fecha }}</td>
                            <td>
                                <a href="{{ route('baja_ninios.edit', $baja->id_baja) }}" 
                                   class="btn btn-warning btn-sm fw-bold mb-1" style="background-color: #ffc107; border: none;">
                                   Editar
                                </a>

                                <form action="{{ route('baja_ninios.destroy', $baja->id_baja) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold" 
                                            style="background-color: #dc3545; border: none;" 
                                            onclick="return confirm('¿Seguro que quieres eliminar este registro?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mensaje si la tabla está vacía --}}
            @if($bajas->isEmpty())
                <p class="text-center mt-3">No hay registros de bajas disponibles.</p>
            @endif
        </div>
    </div>
</div>
@endsection