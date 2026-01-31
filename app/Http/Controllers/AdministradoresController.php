<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class AdministradoresController extends Controller
{
    public function index()
    {   //listado de registros

        $admins = Administradores::all();  //select * from administradores
        //return $usuarios;
        return view('administradores.listado', compact('admins'));
    }
   
    public function create()
    {
        return view('administradores.formulario-crear');
    }

    public function store(Request $req)
    {
        $admin = new Administradores();

        $admin->nombre = $req->nombre;
        $admin->apellidos = $req->apellidos;
        $admin->correo = $req->correo;
        $admin->contrasena = $req->contrasena;
        $admin->imagen = $req->imagen;
        $admin->rol = $req->rol;
        $admin->estado = $req->estado;

        $admin->save(); //insert into

        return redirect('/admins/listado');
    }
}
