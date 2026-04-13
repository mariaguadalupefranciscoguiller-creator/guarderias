@extends('layouts.bodega')

@section('title', 'Gestión de Categorías - Hotel Loto Azul')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" 
         style="background: linear-gradient(135deg, #198754 0%, #146c43 100%); color: white;">
        <div>
            <h2 class="fw-bold mb-0 text-white"> Categorías</h2>
            <p class="mb-0 opacity-75">Organización de Inventario - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('categorias.create') }}" class="btn btn-light btn-lg fw-bold shadow-sm px-4 text-success">
            <i class="fas fa-plus-circle me-2"></i> Nueva Categoría
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: #212529; color: #ffca28;">
                                <tr>
                                    <th class="ps-4 py-3" style="width: 15%;">ID</th>
                                    <th style="width: 55%;">Nombre de la Categoría</th>
                                    <th class="text-center pe-4 text-white" style="width: 30%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $categoria)
                                <tr style="border-left: 5px solid #198754;">
                                    <td class="ps-4 fw-bold text-success">
                                        #{{ $categoria->id_categoria }}
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark fs-5">
                                            <i class="fas fa-tag me-2 text-secondary opacity-50"></i>
                                            {{ $categoria->nombre_categoria }}
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" 
                                               class="btn btn-warning btn-sm fw-bold shadow-sm d-flex align-items-center border-0 px-3" 
                                               style="background-color: #ffca28;">
                                                <i class="fas fa-edit me-1"></i> Editar
                                            </a>

                                            <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" 
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')" class="m-0">
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

                                @if($categorias->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">
                                        <i class="fas fa-folder-open display-4 d-block mb-3 opacity-25"></i>
                                        No hay categorías registradas todavía.
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
        background-color: #f0fdf4 !important; /* Un tono verde muy suave */
        transition: 0.2s;
    }
    .btn-sm {
        font-size: 0.85rem;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection