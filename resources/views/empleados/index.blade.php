@extends('layouts.bodega')

@section('title', 'Personal de la Bodega - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white"> Personal de la Bodega</h2>
            <p class="mb-0 opacity-75">Gestión de equipo de trabajo - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('empleados.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-primary">
            <i class="fas fa-user-plus me-2"></i> Registrar Empleado
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: #212529; color: #ffca28;">
                                <tr>
                                    <th class="ps-4 py-3" style="width: 10%;">ID</th>
                                    <th style="width: 30%;">Nombre(s)</th>
                                    <th style="width: 30%;">Apellidos</th>
                                    <th class="text-center pe-4 text-white" style="width: 30%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)
                                <tr style="border-left: 5px solid #0d6efd;">
                                    <td class="ps-4 fw-bold text-primary">
                                        #{{ $empleado->id_empleado }}
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">
                                            <i class="fas fa-user-circle me-2 text-secondary opacity-50"></i>
                                            {{ $empleado->nombre }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">
                                            {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" 
                                               class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                               style="background-color: #ffca28;">
                                                <i class="fas fa-edit me-1"></i> Editar
                                            </a>

                                            <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" 
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este empleado?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                                        style="background-color: #ff4d4d;">
                                                    <i class="fas fa-user-minus me-1"></i> Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if($empleados->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="fas fa-users-slash display-4 d-block mb-3 opacity-25"></i>
                                        No hay empleados registrados en el sistema.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-white py-4 border-0 text-center">
                    <a href="{{ route('menu.principal') }}" class="btn btn-dark btn-lg px-5 shadow rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Volver al Menú
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #f0f7ff !important; /* Azul muy tenue */
        transition: 0.2s;
    }
    .btn-sm {
        font-size: 0.85rem;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection