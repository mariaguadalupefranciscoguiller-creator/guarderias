@extends('layouts.loto_template')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-warning text-dark p-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);">
                    <h4 class="mb-0 fw-bold text-center">📝 Editar Registro de Entrada</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('entradas.update', $entrada->id_entrada) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Fecha de Entrada</label>
                            <input type="date" name="fecha_entrada" class="form-control bg-light border-0" 
                                   value="{{ $entrada->fecha_entrada }}" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Cantidad</label>
                            <input type="number" name="cantidad_entrada" class="form-control bg-light border-0" 
                                   value="{{ $entrada->cantidad_entrada }}" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Producto</label>
                            <select name="id_producto" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                @foreach($productos as $prod)
                                    <option value="{{ $prod->id_producto }}" {{ $entrada->id_producto == $prod->id_producto ? 'selected' : '' }}>
                                        {{ $prod->nombre }} (ID: #{{ $prod->id_producto }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Encargado Responsable</label>
                            <select name="id_encargado" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                @foreach($encargados as $enc)
                                    <option value="{{ $enc->id_encargado }}" {{ $entrada->id_encargado == $enc->id_encargado ? 'selected' : '' }}>
                                        {{ $enc->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('entradas.index') }}" class="text-decoration-none text-muted fw-bold">
                                ← Volver al listado
                            </a>
                            <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold shadow-sm">
                                Actualizar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection