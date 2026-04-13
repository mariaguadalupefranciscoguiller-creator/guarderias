@extends('layouts.bodega')

@section('title', 'Registro de Entradas - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #059669 0%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white"> Registro de Entradas</h2>
            <p class="mb-0 opacity-75">Ingreso de mercancía a bodega - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('entradas.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-primary">
            <i class="fas fa-plus-circle me-2"></i> Nueva Entrada
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
                                @foreach($entradas as $entrada)
                                <tr style="border-left: 5px solid #059669;">
                                    <td class="ps-4 fw-bold text-primary">
                                        #{{ $entrada->id_entrada }}
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">
                                            <i class="far fa-calendar-alt me-2 text-muted"></i>
                                            {{ $entrada->fecha_entrada }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark px-3 py-2">
                                            + {{ $entrada->cantidad_entrada }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-secondary">
                                            ID Prod: {{ $entrada->id_producto }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            ID Enc: {{ $entrada->id_encargado }}
                                        </span>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('entradas.edit', $entrada->id_entrada) }}" 
                                               class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                               style="background-color: #ffca28;">
                                                <i class="fas fa-edit me-1"></i> Editar
                                            </a>

                                            <form action="{{ route('entradas.destroy', $entrada->id_entrada) }}" method="POST" 
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar este registro de entrada?')" class="m-0">
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

                                @if($entradas->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox display-4 d-block mb-3 opacity-25"></i>
                                        No hay registros de entrada de mercancía.
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
    /* Efecto para las filas */
    .table-hover tbody tr:hover {
        background-color: #f0fdfa !important;
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