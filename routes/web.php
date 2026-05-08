<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// --- A partir de aquí siguen tus rutas ---
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', function () { 
    return redirect('/login'); 
});

Route::get('/login', function () { 
    return view('login'); 
})->name('login');

Route::post('/login', function () { 
    return redirect('/menu-principal'); 
});
Route::post('/logout', function () {
    return redirect('/login');
})->name('logout');

Route::post('/login', function () { 
    return redirect('/menu'); // <--- Esto te mandará a Guardería al entrar
});

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/menu', function () {
    return view('menu_guarderia'); // Asegúrate de que el archivo se llame así
})->name('menu.guarderia');

Route::get('/menu-principal', function () { 
    return view('menu_bodega'); 
})->name('menu.principal');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () { return view('welcome'); })->name('dashboard');

// --- RUTAS DE RECURSOS (CRUDs) ---

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
Route::resource('productos', ProductodosController::class)->names('productosdos');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');