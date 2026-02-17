<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\LoginController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Administradores; 
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rutas protegidas
Route::middleware(['auth:admin'])->group(function () {

    // Dashboard
    Route::get('/bienvenido', function () {
        return view('inicio.inicio'); 
    })->name('bienvenido');

    Route::view('/mapa', '/mapa/mapa');

    //RUTAS SUCURSALES
    Route::get('/sucursales/listado', [SucursalesController::class, 'index']);
    Route::get('/sucursales/registro', [SucursalesController::class, 'create']);
    Route::post('/sucursales/store', [SucursalesController::class, 'store']);
    Route::get('/sucursales/{id}/editar', [SucursalesController::class, 'edit'])->name('sucursales.edit');
    Route::post('/sucursales/{id}/actualizar', [SucursalesController::class, 'update'])->name('sucursales.update');
    Route::delete('/sucursales/{id}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy');


    //RUTAS SERVICIOS
    Route::get('/servicios/listado', [ServiciosController::class, 'index']);
    Route::get('/servicios/registro', [ServiciosController::class, 'create']);
    Route::post('/servicios/store', [ServiciosController::class, 'store']);
    Route::get('/servicios/{id}/editar', [ServiciosController::class, 'edit']);
    Route::post('/servicios/{id}/actualizar', [ServiciosController::class, 'update']);
    Route::delete('/servicios/{id}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');

    //Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
    Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
    Route::get('/servicios/{servicio}', [ServiciosController::class, 'show'])->name('servicios.show');


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
    Route::get('/admins/{id}/editar', [AdministradoresController::class, 'edit'])->name('admins.edit');
    Route::post('/admins/{id}/actualizar', [AdministradoresController::class, 'update']);
    Route::delete('/admins/{id}', [AdministradoresController::class, 'destroy'])->name('admins.destroy');


    Route::put('/admins/{admin}', [AdministradoresController::class, 'update'])->name('admins.update');
    Route::get('/admins/{admin}', [AdministradoresController::class, 'show'])->name('admins.show');

    // Cerrar sesión
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});




Route::view('/inicio', '/inicio/app');
//clientes
Route::view('/clientes/registro', '/clientes/formulario-crear');
Route::view('/clientes/listado', '/clientes/listado');

//citas
Route::view('/citas/registro', '/citas/formulario-crear');
Route::view('/citas/listado', '/citas/listado');
//pagos
Route::view('/pagos/registro', '/pagos/formulario-crear');
Route::view('/pagos/listado', '/pagos/listado');




//LOGIN, REGISTRO
// Route::view('bienvenido', '/inicio/inicio');
// Route::view('/login', '/iniciodesesion/sesion');
// Route::get('/registro', [RegistrosController::class, 'create']);
// Route::post('/registro/store', [RegistrosController::class, 'store']);



//login google
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    try{
        $googleUser = Socialite::driver('google')->user();

        //busca si el usuario ya existe en la BD
        $admin = Administradores::where('correo', $googleUser->getEmail())->first();

        //sino existe, se crea
        if (!$admin) {
            $admin = Administradores::create([
                'nombre' => $googleUser->getName(),
                'apellidos' => '',
                'correo' => $googleUser->getEmail(),
                'contrasena' => Hash::make(uniqid()), //genera una constraseña aleatoria 
                'imagen' => $googleUser->getAvatar(),
                'estado' => 1, //estado activo por defecto
                'rol' => 'Empleado', //rol por defecto
            ]);
        }

        if ($admin->estado == 1) {
            Auth::guard('admin')->login($admin);
            return redirect('/bienvenido');
        } else {
            return redirect('/login')->withErrors(['error' => 'Cuenta inactiva. Consulta con un administrador.']);
        }

    } catch (Exception $e) {
        return redirect('/login')->withErrors(['error' => 'Error al iniciar sesión con Google']);
    }
})->name('google.callback');

