@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white text-center fw-bold" style="background-color: #198754;">
            <h3 class="mb-0">Registro de Cuentas Bancarias</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('registro_cuentas.create') }}" class="btn btn-success mb-3">Registrar Nueva Cuenta</a>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID Registro</th>
                        <th>ID Familiar</th>
                        <th>Número de Cuenta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuentas as $c)
                    <tr>
                        <td>{{ $c->id_registro_cuenta }}</td>
                        <td>{{ $c->id_familiar }}</td>
                        <td>{{ $c->cuenta }}</td>
                        <td>
                            <a href="{{ route('registro_cuentas.edit', $c->id_registro_cuenta) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('registro_cuentas.destroy', $c->id_registro_cuenta) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cuenta?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection