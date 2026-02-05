<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registros;
use App\Models\Administradores;

class RegistrosController extends Controller
{

    public function create()
    {
        return view('iniciodesesion.sesion-formulario');
    }
    
    public function store(Request $request)
    {
        $registro = new Administradores();

        $registro->nombre = $request->nombre;
        $registro->apellidos = $request->apellidos;
        $registro->correo = $request->correo;
        $registro->contrasena = $request->contrasena;
        $registro->imagen = $request->imagen;
        $registro->rol = $request->rol;
        $registro->estado = $request->estado;

        $registro->save(); //insert into

        return redirect('/login');
    }
}
