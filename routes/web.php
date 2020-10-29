<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('categorias', App\Http\Controllers\CategoriaController::class);

Route::resource('subcategorias', App\Http\Controllers\SubcategoriaController::class);

Route::resource('ciudades', App\Http\Controllers\CiudadController::class);

Route::resource('referencias', App\Http\Controllers\ReferenciaController::class);

Route::resource('experiencias', App\Http\Controllers\ExperienciaController::class);

Route::resource('empresas', App\Http\Controllers\EmpresaController::class);

Route::resource('configuraciones', App\Http\Controllers\ConfiguracionController::class);

Route::resource('favoritos', App\Http\Controllers\FavoritoController::class);

Route::resource('denuncias', App\Http\Controllers\DenunciaController::class);

Route::resource('planes', App\Http\Controllers\PlanController::class);

Route::resource('planesUsuario', App\Http\Controllers\PlanUsuarioController::class);

Route::resource('pagos', App\Http\Controllers\PagoController::class);

Route::resource('vacantes', App\Http\Controllers\VacanteController::class);

Route::resource('postulaciones', App\Http\Controllers\PostulacionController::class);

Route::resource('mensajes', App\Http\Controllers\MensajeController::class);

Route::resource('estudios', App\Http\Controllers\EstudioController::class);

Route::resource('perfiles', App\Http\Controllers\PerfilController::class);

Route::get('samanathor', function () {
    dd("ramparapampam");
});
