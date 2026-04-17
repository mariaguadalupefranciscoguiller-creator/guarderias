@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Historial de Abonos</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('abonos.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    Registrar Nuevo Abono
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Nombre Nino</th>
                            <th>Nombre Familiar</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abonos as $index => $abono)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            
                            <td>
                                <span class="badge bg-info text-dark" style="font-size: 0.9rem;">
                                    ${{ number_format($abono->cantidad, 0) }}
                                </span>
                            </td>
                            
                            <td>{{ $abono->fecha }}</td>

                            <td class="text-dark fw-bold">
                                {{ $abono->nombre_ninio }}
                            </td>
                            
                            <td class="text-muted">
                                {{ $abono->nombre_tutor }}
                            </td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('abonos.edit', $abono->id_abono) }}" 
                                       class="btn btn-warning btn-sm fw-bold shadow-sm">
                                       Editar
                                    </a>

                                    <form action="{{ route('abonos.destroy', $abono->id_abono) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm" 
                                                onclick="return confirm('¿Seguro que quieres eliminar este abono?')">
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

            @if($abonos->isEmpty())
                <div class="alert alert-light text-center mt-3">
                    No se encontraron abonos registrados.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection