@extends("layouts.template")
@section("content")
<div class="row">
    <div class="col">
        <h2>Crear un abono</h2>
        <form action="">
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Id Abono</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fecha abono</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Id RegCuenta</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
        </form>
    </div>
</div>
@endsection

