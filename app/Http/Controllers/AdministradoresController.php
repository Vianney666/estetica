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
        $admin->imagen = '/imagenes/administradores/administrador_default.jpg'; //$req->imagen;
        $admin->rol = $req->rol;
        $admin->estado = $req->estado;

        $admin->save(); //insert into

        if ($req->has('imagen')) {
            $imagen = $req->imagen;
            $nuevo_nombre = 'administrador_'.$admin->id.'.jpg';
            $ruta = $imagen->storeAs('imagenes/administradores' ,$nuevo_nombre,'public');
            $admin->$imagen = $ruta;
            $admin->save();

        }

        return redirect('/admins/listado');
    }

    public function edit($id)
    {
        $administradores = Administradores::find($id);
        return view('administradores.formulario-editar')->with('administradores', $administradores);
    }

    public function update(Request $req, $id)
    {
        $admin = Administradores::find($id);

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

    public function destroy($id)
    {
        $admin = Administradores::find($id);

        $admin->delete();

        return redirect('/admins/listado')->with('hecho', 'Administrador eliminado');
    }

    
}
