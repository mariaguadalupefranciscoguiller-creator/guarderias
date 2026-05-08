@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header text-white fw-bold text-center" style="background-color: #198754;">
                    <h4 class="mb-0">Registrar Familiar</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('familiares.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                        {{-- Selector para ID Persona --}}
                        <div class="mb-3 text-start">
                            <label for="id_persona" class="form-label fw-bold">Seleccionar Persona (Familiar)</label>
                            <select name="id_persona" id="id_persona" class="form-select" required>
                                <option value="" disabled selected>Seleccione la persona...</option>
                                @foreach($personas as $persona)
                                    <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Campo DNI (Se mantiene texto) --}}
                        <div class="mb-3 text-start">
                            <label for="dni" class="form-label fw-bold">DNI</label>
                            <input type="text" name="dni" class="form-control" placeholder="Ej: 12345678" required>
                        </div>

                        {{-- Campo Dirección (Se mantiene texto) --}}
                        <div class="mb-3 text-start">
                            <label for="direccion" class="form-label fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control" placeholder="Calle Ejemplo #123" required>
                        </div>

                        {{-- Selector para ID Parentesco --}}
                        <div class="mb-3 text-start">
                            <label for="id_parentezco" class="form-label fw-bold">Parentesco</label>
                            <select name="id_parentezco" id="id_parentezco" class="form-select" required>
                                <option value="" disabled selected>Seleccione el parentesco...</option>
                                @foreach($parentescos as $parentesco)
                                    <option value="{{ $parentesco->id_parentezco }}">{{ $parentesco->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Selector para ID Niño --}}
                        <div class="mb-3 text-start">
                            <label for="id_ninio" class="form-label fw-bold">Niño Vinculado</label>
                            <select name="id_ninio" id="id_ninio" class="form-select" required>
                                <option value="" disabled selected>¿A qué niño representa?</option>
                                @foreach($ninios as $ninio)
                                    <option value="{{ $ninio->id_ninio }}">{{ $ninio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection