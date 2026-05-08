@extends('layouts.loto_template')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white p-4 text-center" style="border-radius: 20px 20px 0 0;">
                    <h4 class="mb-0 fw-bold">📝 Editar Información del Empleado</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Nombre(s)</label>
                                <input type="text" name="nombre" class="form-control bg-light border-0" 
                                       value="{{ $empleado->nombre }}" required style="border-radius: 10px; height: 45px;">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control bg-light border-0" 
                                       value="{{ $empleado->apellido_paterno }}" required style="border-radius: 10px; height: 45px;">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control bg-light border-0" 
                                       value="{{ $empleado->apellido_materno }}" required style="border-radius: 10px; height: 45px;">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold small text-muted text-uppercase">Puesto / Cargo</label>
                                <input type="text" name="puesto" class="form-control bg-light border-0" 
                                       value="{{ $empleado->puesto }}" required style="border-radius: 10px; height: 45px;">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('empleados.index') }}" class="text-decoration-none text-muted fw-bold">← Regresar</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection