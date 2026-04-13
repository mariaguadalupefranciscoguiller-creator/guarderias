@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark mb-4">Nuevo Abono</h2>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('abonos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad (Monto)</label>
                            <input type="number" step="0.01" name="cantidad" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Registro Cuenta</label>
                            <input type="number" name="id_registro_cuenta" class="form-control" placeholder="Ej: 1" required>
                        </div>
                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-success px-4">Guardar Registro</button>
                            <a href="{{ route('abonos.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection