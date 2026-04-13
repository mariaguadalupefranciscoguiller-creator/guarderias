@extends('layouts.bodega')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0 fw-bold">Editar Empleado: {{ $empleado->nombre }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control" 
                                   value="{{ $empleado->nombre }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control" 
                                       value="{{ $empleado->apellido_paterno }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control" 
                                       value="{{ $empleado->apellido_materno }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Puesto</label>
                            <input type="text" name="puesto" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection