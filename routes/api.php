<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('categorias', App\Http\Controllers\API\CategoriaAPIController::class);

Route::resource('subcategorias', App\Http\Controllers\API\SubcategoriaAPIController::class);

Route::resource('ciudades', App\Http\Controllers\API\CiudadAPIController::class);

Route::resource('referencias', App\Http\Controllers\API\ReferenciaAPIController::class);

Route::resource('experiencias', App\Http\Controllers\API\ExperienciaAPIController::class);

Route::resource('empresas', App\Http\Controllers\API\EmpresaAPIController::class);

Route::resource('configuraciones', App\Http\Controllers\API\ConfiguracionAPIController::class);

Route::resource('favoritos', App\Http\Controllers\API\FavoritoAPIController::class);

Route::resource('denuncias', App\Http\Controllers\API\DenunciaAPIController::class);

Route::resource('planes', App\Http\Controllers\API\PlanAPIController::class);

Route::resource('planes_usuario', App\Http\Controllers\API\PlanUsuarioAPIController::class);

Route::resource('pagos', App\Http\Controllers\API\PagoAPIController::class);

Route::resource('vacantes', App\Http\Controllers\API\VacanteAPIController::class);

Route::resource('postulaciones', App\Http\Controllers\API\PostulacionAPIController::class);

Route::resource('mensajes', App\Http\Controllers\API\MensajeAPIController::class);

Route::resource('estudios', App\Http\Controllers\API\EstudioAPIController::class);

Route::resource('perfiles', App\Http\Controllers\API\PerfilAPIController::class);

Route::post('facebook_login', [UserAPIController::class, 'loginFacebook']);

Route::post('google_login', [UserAPIController::class, 'loginGoogle']);

Route::post('login', [UserAPIController::class, 'login']);

Route::post('register', [UserAPIController::class, 'register']);

Route::get('userInfo', [UserAPIController::class, 'info']);
