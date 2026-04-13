@extends("layouts.app")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Lista de Platos</h4>
            </div>
            <div class="row">
                <div class="col-1">
                    <a  class="btn btn-success px-4 mt-4" href="{{url('platos/create')}}">
                        Registrar
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                    <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($platos as $plato)
                        <tr>
                            <td class="fw-bold">{{$loop->index+1}}</td>
                            <td>{{$plato->nombre}}</td>
                            <td>{{$plato->precio}}</td>
                            <td>
                                <a  class="btn btn-warning px-4 mt-4" href="{{route('platos.edit',$plato)}}">
                                    Editar
                                </a>

                                <form action="{{route('platos.destroy',$plato)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-danger px-4 mt-4">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection