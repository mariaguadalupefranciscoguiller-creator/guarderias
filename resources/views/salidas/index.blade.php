@extends('layouts.bodega')

@section('title', 'Registro de Salidas - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #f59e0b 0%, #dc2626 100%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white"> Registro de Salidas</h2>
            <p class="mb-0 opacity-75">Salida de mercancía de bodega - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('salidas.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-danger">
            <i class="fas fa-minus-circle me-2"></i> Nueva Salida
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
                                    <th style="width: 15%;">Fecha</th>
                                    <th style="width: 15%;">Cantidad</th>
                                    <th style="width: 15%;">Producto</th>
                                    <th style="width: 15%;">Encargado</th>
                                    <th class="text-center pe-4 text-white" style="width: 30%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salidas as $salida)
                                <tr style="border-left: 5px solid #dc2626;">
                                    <td class="ps-4 fw-bold text-danger">
                                        #{{ $salida->id_salida }}
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">
                                            <i class="far fa-calendar-minus me-2 text-muted"></i>
                                            {{ $salida->fecha_salida }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger px-3 py-2 fw-bold" style="min-width: 60px;">
                                            - {{ $salida->cantidad_salida }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-secondary">
                                            ID Prod: {{ $salida->id_producto }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            ID Enc: {{ $salida->id_encargado }}
                                        </span>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('salidas.edit', $salida->id_salida) }}" 
                                               class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                               style="background-color: #ffca28;">
                                                <i class="fas fa-edit me-1"></i> Editar
                                            </a>

                                            <form action="{{ route('salidas.destroy', $salida->id_salida) }}" method="POST" 
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar este registro de salida?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                                        style="background-color: #ff4d4d;">
                                                    <i class="fas fa-trash me-1"></i> Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if($salidas->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-dolly-flatbed display-4 d-block mb-3 opacity-25"></i>
                                        No hay registros de salida de mercancía.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-white py-4 border-0 text-center">
                    <a href="{{ route('menu.principal') }}" class="btn btn-dark btn-lg px-5 shadow rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Regresar al Menú Principal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Efecto para resaltar la fila al pasar el mouse */
    .table-hover tbody tr:hover {
        background-color: #fffaf0 !important;
        transition: 0.2s;
    }
    .btn-sm {
        font-size: 0.85rem;
        border-radius: 8px;
    }
    .badge {
        font-size: 0.9rem;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection