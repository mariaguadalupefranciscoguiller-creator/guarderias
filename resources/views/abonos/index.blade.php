@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-dark">Registro de Abonos</h2>
                <a href="{{ route('abonos.create') }}" class="btn btn-success shadow-sm">
                    + Nuevo Abono
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>ID Cuenta</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abonos as $abono)
                            <tr>
                                <td class="fw-bold">#{{ $abono->id_abono }}</td>
                                <td>{{ $abono->fecha }}</td>
                                <td>${{ number_format($abono->cantidad, 2) }}</td>
                                <td>{{ $abono->id_registro_cuenta }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('abonos.edit', $abono->id_abono) }}" 
                                           class="btn btn-sm btn-warning">Editar</a>

                                        <form action="{{ route('abonos.destroy', $abono->id_abono) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('menu.principal') }}" class="btn btn-outline-secondary btn-sm">
                    Volver al Menú
                </a>
            </div>
        </div>
    </div>
</div>
@endsection