@extends('layouts.loto_template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white p-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%); border: none;">
                    <h3 class="mb-0 fw-bold">✨ Registrar Nuevo Empleado</h3>
                    <p class="mb-0 opacity-75">Personal de Bodega - Hotel Loto Azul</p>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control bg-light border-0" placeholder="Ej: Juan" required style="border-radius: 12px; height: 50px;">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-muted small text-uppercase">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control bg-light border-0" required style="border-radius: 12px; height: 50px;">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-muted small text-uppercase">Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control bg-light border-0" required style="border-radius: 12px; height: 50px;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Puesto o Cargo</label>
                            <input type="text" name="puesto" class="form-control bg-light border-0" placeholder="Ej: Encargado de Turno" required style="border-radius: 12px; height: 50px;">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-bold">Cancelar</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow">
                                Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection