@extends('layouts.bodega')

@section('title', 'Registro de Encargados - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white"> Registro de Encargados</h2>
            <p class="mb-0 opacity-75">Administración de responsables de área - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('encargados.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-primary">
            <i class="fas fa-id-badge me-2"></i> Nuevo Encargado
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
                                    <th style="width: 20%;">Nombre</th>
                                    <th style="width: 20%;">Apellido Paterno</th>
                                    <th style="width: 20%;">Apellido Materno</th>
                                    <th class="text-center pe-4 text-white" style="width: 30%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($encargados as $encargado)
                                <tr style="border-left: 5px solid #a855f7;">
                                    <td class="ps-4 fw-bold text-primary">
                                        #{{ $encargado->id_encargado }}
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">
                                            <i class="fas fa-user-tie me-2 text-secondary opacity-50"></i>
                                            {{ $encargado->nombre }}
                                        </div>
                                    </td>
                                    <td>{{ $encargado->apellido_paterno }}</td>
                                    <td>{{ $encargado->apellido_materno }}</td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('encargados.edit', $encargado->id_encargado) }}" 
                                               class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                               style="background-color: #ffca28;">
                                                <i class="fas fa-user-edit me-1"></i> Editar
                                            </a>

                                            <form action="{{ route('encargados.destroy', $encargado->id_encargado) }}" method="POST" 
                                                  onsubmit="return confirm('¿Desea eliminar a este encargado?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                                        style="background-color: #ff4d4d;">
                                                    <i class="fas fa-user-slash me-1"></i> Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if($encargados->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fas fa-user-lock display-4 d-block mb-3 opacity-25"></i>
                                        No hay registros de encargados.
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
        background-color: #f5f3ff !important; /* Violeta muy suave */
        transition: 0.2s;
    }
    .btn-sm {
        font-size: 0.85rem;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection