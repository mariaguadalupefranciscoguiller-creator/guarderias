@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark mb-4">Editar Abono #{{ $abono->id_abono }}</h2>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('abonos.update', $abono->id_abono) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="{{ $abono->fecha }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad (Monto)</label>
                            <input type="number" step="0.01" name="cantidad" class="form-control" value="{{ $abono->cantidad }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Registro Cuenta</label>
                            <input type="number" name="id_registro_cuenta" class="form-control" value="{{ $abono->id_registro_cuenta }}" required>
                        </div>
                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar</button>
                            <a href="{{ route('abonos.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection