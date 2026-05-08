@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Alta de Cuenta</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('registro_cuentas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_familiar" class="form-label fw-bold">Familiar Responsable</label>
                            <select name="id_familiar" id="id_familiar" class="form-select" required>
                                <option value="" disabled selected>Selecciona un familiar...</option>
                                @foreach($familiares as $familiar)
                                    <option value="{{ $familiar->id_familiar }}">
                                        {{ $familiar->nombre }} (ID: {{ $familiar->id_familiar }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Número de Cuenta</label>
                            <input type="text" name="cuenta" class="form-control" placeholder="Ej: 123456789" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('registro_cuentas.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection