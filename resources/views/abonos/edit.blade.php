@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Cabecera Minimalista --}}
    <div class="mb-5">
        <h2 class="fw-bold text-dark m-0" style="letter-spacing: -0.5px;">Editar Abono</h2>
        <p class="text-secondary small">Actualizando el registro de pago #{{ $abono->id_abono }}</p>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm p-2" style="border-radius: 12px; border: 1px solid #edf2f7 !important;">
                <div class="card-body p-4">
                    <form action="{{ route('abonos.update', $abono->id_abono) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-muted small fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 0.5px;">Alumno / Titular de la Cuenta</label>
                            <select name="id_registro_cuenta" id="id_registro_cuenta" class="form-select border-0 bg-light py-2" style="border-radius: 8px;" required>
                                @foreach($cuentas as $cuenta)
                                    <option value="{{ $cuenta->id_registro_cuenta }}" 
                                        {{ $abono->id_registro_cuenta == $cuenta->id_registro_cuenta ? 'selected' : '' }}>
                                        {{ $cuenta->nombre_ninio }} — (Folio: {{ $cuenta->cuenta }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="text-muted small fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 0.5px;">Fecha del Registro</label>
                                <input type="date" name="fecha" value="{{ $abono->fecha }}" class="form-control border-0 bg-light py-2" style="border-radius: 8px;" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted small fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 0.5px;">Monto (Cantidad)</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light text-secondary">$</span>
                                    <input type="number" step="0.01" name="cantidad" value="{{ $abono->cantidad }}" class="form-control border-0 bg-light py-2" style="border-radius: 0 8px 8px 0;" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 pt-3">
                            <button type="submit" class="btn btn-dark px-4 fw-bold" style="border-radius: 8px; font-size: 0.9rem;">
                                Actualizar Registro
                            </button>
                            <a href="{{ route('abonos.index') }}" class="btn btn-link text-decoration-none text-secondary fw-bold" style="font-size: 0.9rem;">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection