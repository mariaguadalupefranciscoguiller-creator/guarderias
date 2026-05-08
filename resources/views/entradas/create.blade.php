@extends('layouts.loto_template')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-success text-white p-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #198754 0%, #146c43 100%);">
                    <h4 class="mb-0 fw-bold">📥 Registrar Entrada de Mercancía</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('entradas.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Entrada</label>
                            <input type="date" name="fecha" class="form-control bg-light border-0" value="{{ date('Y-m-d') }}" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control bg-light border-0" placeholder="0" required style="border-radius: 10px; height: 45px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Seleccionar Producto</label>
                            <select name="id_producto" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                <option value="" selected disabled>Escoge el producto...</option>
                                @foreach($productos as $prod)
                                    <option value="{{ $prod->id_producto }}">{{ $prod->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Encargado de Recepción</label>
                            <select name="id_encargado" class="form-select bg-light border-0" required style="border-radius: 10px; height: 45px;">
                                <option value="" selected disabled>Escoge al encargado...</option>
                                @foreach($encargados as $enc)
                                    <option value="{{ $enc->id_encargado }}">{{ $enc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('entradas.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancelar</a>
                            <button type="submit" class="btn btn-success rounded-pill px-5 fw-bold shadow-sm">Guardar Entrada</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection