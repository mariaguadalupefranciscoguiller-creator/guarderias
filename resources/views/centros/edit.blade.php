@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0"> Editar a {{$centro->nombre}}</h4>
            </div>

            <div class="card-body p-4">
                <form action="{{route('centros.update',$centro)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Pequenos Suenos" value="{{$centro->nombre}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" class="form-control" id="costo" name="costo" placeholder="1500" value="{{$centro->costo}}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-outline-secondary">
                            Limpiar
                        </button>

                        <button type="submit" class="btn btn-success px-4">
                            Guardar
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>

@endsection