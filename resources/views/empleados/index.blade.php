@extends('layouts.loto_template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">👥 Personal de la Bodega</h2>
            <p class="text-muted">Gestión de equipo de trabajo - Hotel Loto Azul</p>
        </div>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">
            + Registrar Empleado
        </a>
    </div>

    <div class="row g-3">
        @foreach($empleados as $emp)
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3">ID: #{{ $emp->id_empleado }}</span>
                    </div>
                    
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <span style="font-size: 2rem;">👤</span>
                    </div>

                    <h5 class="fw-bold mb-1">{{ $emp->nombre }}</h5>
                    <p class="text-muted mb-3">{{ $emp->apellido_paterno }} {{ $emp->apellido_materno }}</p>
                    
                    <div class="bg-light p-2 rounded-3 mb-4">
                        <span class="small fw-bold text-uppercase text-primary">{{ $emp->puesto }}</span>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('empleados.edit', $emp->id_empleado) }}" class="btn btn-sm btn-warning rounded-pill px-4 fw-bold">Editar</a>
                        <form action="{{ route('empleados.destroy', $emp->id_empleado) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-4" onclick="return confirm('¿Retirar al empleado?')">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection