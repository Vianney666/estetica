<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/inicio', '/inicio/app');
//clientes
Route::view('/clientes/registro', '/clientes/formulario-crear');
Route::view('/clientes/listado', '/clientes/listado');
//sucursales
Route::view('/sucursales/registro', '/sucursales/formulario-crear');
Route::view('/sucursales/listado', '/sucursales/listado');
//servicios
Route::view('/servicios/registro', '/servicios/formulario-crear');
Route::view('/servicios/listado', '/servicios/listado');
//citas
Route::view('/citas/registro', '/citas/formulario-crear');
Route::view('/citas/listado', '/citas/listado');
//pagos
Route::view('/pagos/registro', '/pagos/formulario-crear');
Route::view('/pagos/listado', '/pagos/listado');
//administradores
Route::view('/admins/registro', '/administradores/formulario-crear');
//Route::view('/admins/listado', '/administradores/listado');

Route::get('/usuarios/listado' , [UsuarioController::class,'index']);

