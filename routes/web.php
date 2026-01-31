<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ClientesController;

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
//Route::view('/sucursales/registro', '/sucursales/formulario-crear');
//Route::view('/sucursales/listado', '/sucursales/listado');
//servicios
//Route::view('/servicios/registro', '/servicios/formulario-crear');
//Route::view('/servicios/listado', '/servicios/listado');
//citas
Route::view('/citas/registro', '/citas/formulario-crear');
Route::view('/citas/listado', '/citas/listado');
//pagos
Route::view('/pagos/registro', '/pagos/formulario-crear');
Route::view('/pagos/listado', '/pagos/listado');
//administradores
//Route::view('/admins/registro', '/administradores/formulario-crear');
//Route::view('/admins/listado', '/administradores/listado');

//RUTAS SUCURSALES

Route::get('/sucursales/listado', [SucursalesController::class, 'index']);
Route::get('/sucursales/registro', [SucursalesController::class, 'create']);
Route::post('/sucursales/store', [SucursalesController::class, 'store']);

Route::get('/sucursales/{sucursal}/edit', [SucursalesController::class, 'edit'])->name('sucursales.edit');
Route::put('/sucursales/{sucursal}', [SucursalesController::class, 'update'])->name('sucursales.update');
Route::get('/sucursales/{sucursal}', [SucursalesController::class, 'show'])->name('sucursales.show');
Route::delete('/sucursales/{sucursal}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy');

//RUTAS SERVICIOS
Route::get('/servicios/listado', [ServiciosController::class, 'index']);
Route::get('/servicios/registro', [ServiciosController::class, 'create']);
Route::post('/servicios/store', [ServiciosController::class, 'store']);

//Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
Route::get('/servicios/{servicio}', [ServiciosController::class, 'show'])->name('servicios.show');
Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');

/*RUTAS CLIENTES
Route::get('/clientes/listado', [ClientesController::class, 'listar'])->name('clientes.listado');
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesController   ::class, 'update'])->name('clientes.update');
Route::get('/clientes/{cliente}', [ClientesController::class, 'show'])->name('clientes.show');
Route::delete('/clientes/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');*/

//RUTAS ADMINISTRADORES
Route::get('/admins/listado', [AdministradoresController::class, 'index']);
Route::get('/admins/registro', [AdministradoresController::class, 'create']);
Route::post('/admins/store', [AdministradoresController::class, 'store']);

Route::get('/admins/{admin}/edit', [AdministradoresController::class, 'edit'])->name('admins.edit');
Route::put('/admins/{admin}', [AdministradoresController::class, 'update'])->name('admins.update');
Route::get('/admins/{admin}', [AdministradoresController::class, 'show'])->name('admins.show');
Route::delete('/admins/{admin}', [AdministradoresController::class, 'destroy'])->name('admins.destroy');


