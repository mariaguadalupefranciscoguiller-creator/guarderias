<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
</head>
<body>

    <h1>Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        
        <div>
            <input type="text" name="nombre" placeholder="Nombre" style="width: 200px;">
        </div>

        <div>
            <textarea name="descripcion" placeholder="Descripción" style="width: 200px; height: 50px;"></textarea>
        </div>

        <div>
            <input type="text" name="precio" placeholder="Precio" style="width: 200px;">
        </div>

        <button type="submit">Guardar</button>

    </form>

</body>
</html>