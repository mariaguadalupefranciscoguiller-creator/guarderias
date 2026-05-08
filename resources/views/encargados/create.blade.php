@extends('layouts.loto_template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0 fw-bold">Registrar Nuevo Encargado</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('encargados.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control" required>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('encargados.index') }}" class="btn btn-outline-secondary px-4">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4 fw-bold">Guardar Encargado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection