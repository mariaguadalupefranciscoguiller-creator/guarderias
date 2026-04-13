<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NinioController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\BajaNinioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProductodosController;
use App\Http\Controllers\ParentezcoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RegistroComidaController;
use App\Http\Controllers\RegistroCuentaController;
// 1. Al entrar al proyecto sin loguearse, mandamos al login
Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/', function () { 
    return redirect('/login'); 
});

// 2. Mostrar el formulario de Login
Route::get('/login', function () { 
    return view('login'); 
})->name('login');

// 3. Procesar el Login y mandar al menú de botones (welcome)
Route::post('/login', function () { 
    return redirect('/menu-principal'); 
});

// 4. Esta es la página de los botones (welcome.blade.php)
// 3. Procesar el Login y mandar al menú de botones (welcome)
Route::post('/login', function () { 
    return redirect('/menu-principal'); 
});

// 4. Esta es la página de los botones (welcome.blade.php)
// Ruta #4: El menú de botones (ASEGÚRATE QUE TENGA LAS DOS //)
Route::get('/menu-principal', function () { 
    return view('menu_bodega'); // El nombre del archivo que acabas de crear
})->name('menu.principal');

// 5. El home CORREGIDO: Ahora ya no usa el HomeController para evitar el error "View [home] not found"
// Ahora, si algo intenta entrar a /home, lo manda directo al menú principal.
Route::get('/home', function () { 
    return view('welcome'); 
})->name('home');

// 6. Todos tus recursos (se quedan igual, no se tocan)
//Route::resource('productos', ProductoController::class);
Route::resource('ninios', NinioController::class);
Route::resource('abonos', AbonoController::class);
Route::resource('baja_ninios', BajaNinioController::class);
Route::resource('alergias', AlergiaController::class);
Route::resource('centros', CentroController::class);
Route::resource('registro_comidas', RegistroComidaController::class);
Route::resource('registro_cuentas', RegistroCuentaController::class);
Route::resource('familiares', FamiliarController::class);
Route::resource('personas', PersonaController::class);
Route::resource('ingredientes', IngredienteController::class);
Route::resource('menus', MenuController::class);
Route::resource('platos', PlatoController::class);
Route::resource('parentezcos', ParentezcoController::class);
Route::resource('productosdos', ProductodosController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('entradas', EntradaController::class);
Route::resource('salidas', SalidaController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('encargados', EncargadoController::class);