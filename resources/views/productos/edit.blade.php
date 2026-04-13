<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $producto->nombre }}"><br>
    <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br>
    <input type="text" name="precio" value="{{ $producto->precio }}"><br>

    <button type="submit">Actualizar</button>
</form>
