@extends('layouts.loto_template')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white p-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);">
                    <h4 class="mb-0 fw-bold text-center">📝 Editar Registro de Salida</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('salidas.update', $salida->id_salida) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">FECHA DE SALIDA</label>
                            <input type="date" name="fecha_salida" class="form-control bg-light border-0" 
                                   value="{{ $salida->fecha_salida }}" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">CANTIDAD A RETIRAR</label>
                            <input type="number" name="cantidad_salida" class="form-control bg-light border-0" 
                                   value="{{ $salida->cantidad_salida }}" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">PRODUCTO</label>
                            <select name="id_producto" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                @foreach($productos as $prod)
                                    <option value="{{ $prod->id_producto }}" {{ $salida->id_producto == $prod->id_producto ? 'selected' : '' }}>
                                        {{ $prod->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">ENCARGADO QUE AUTORIZA</label>
                            <select name="id_encargado" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                @foreach($encargados as $enc)
                                    <option value="{{ $enc->id_encargado }}" {{ $salida->id_encargado == $enc->id_encargado ? 'selected' : '' }}>
                                        {{ $enc->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <a href="{{ route('salidas.index') }}" class="btn btn-link text-decoration-none text-muted fw-bold">Volver</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Actualizar Salida</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection