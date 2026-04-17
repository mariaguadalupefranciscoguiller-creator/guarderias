@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Registro de Cuentas Bancarias</h3>
        </div>

        <div class="card-body">
            <div class="mb-3 text-start">
                <a href="{{ route('registro_cuentas.create') }}" class="btn btn-success" style="background-color: #198754; border: none;">
                    Registrar Nueva Cuenta
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Registro</th>
                            <th>ID Familiar</th>
                            <th>Número de Cuenta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuentas as $cuenta)
                        <tr>
                            <td class="fw-bold">{{ $cuenta->id_registro_cuenta }}</td>
                            <td>{{ $cuenta->nombre_familiar }}</td>
                            
                            <td>{{ $cuenta->cuenta }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('registro_cuentas.edit', $cuenta->id_registro_cuenta) }}" 
                                       class="btn btn-warning btn-sm fw-bold">Editar</a>
                                    
                                    <form action="{{ route('registro_cuentas.destroy', $cuenta->id_registro_cuenta) }}" method="POST" class="m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold" 
                                                onclick="return confirm('¿Borrar?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection