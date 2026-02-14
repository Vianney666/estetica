<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;
use Illuminate\Support\Facades\Hash; //para encriptar la contraseña

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

        $req->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:Administradores,correo',
            //  
            'confirmar_contrasena' => 'required|same:contrasena',
            'rol' => 'required',
            'estado' => 'required',
        ], [
            
            'confirmar_contrasena.same' => 'Las contraseñas no coinciden.',
            'correo.unique' => 'Este correo ya está registrado.',
        ]);


        $admin->nombre = $req->nombre;
        $admin->apellidos = $req->apellidos;
        $admin->correo = $req->correo;
        $admin->contrasena = Hash::make($req->contrasena); //este es para encriptar la contraseña
        $admin->imagen = '/imagenes/administradores/administrador_default.jpg'; 
        $admin->estado = $req->estado;
        $admin->rol = $req->rol;

        $admin->save(); //insert into

        if ($req->has('imagen')) {
            $imagen = $req->imagen;
            $nuevo_nombre = 'administrador_' . $admin->id . '.jpg';
            $ruta = $imagen->storeAs('imagenes/administradores', $nuevo_nombre, 'public');
            $admin->imagen = '/storage/' . $ruta;
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

        $req->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:Administradores,correo,' . $id,
            'confirmar_contrasena' => 'required|same:contrasena',
            'rol' => 'required',
            'estado' => 'required',
        ], [
           
            'confirmar_contrasena.same' => 'Las contraseñas no coinciden.',
            'correo.unique' => 'Este correo ya está registrado.',
        ]);

        $admin->nombre = $req->nombre;
        $admin->apellidos = $req->apellidos;
        $admin->correo = $req->correo;
        if ($req->filled('contrasena')) {
            $admin->contrasena = Hash::make($req->contrasena); 
        }

        $admin->rol = $req->rol;
        $admin->estado = $req->estado;

        $admin->save(); //insert into

        if ($req->has('imagen')) {
            $imagen = $req->imagen;
            $nuevo_nombre = 'administrador_' . $admin->id . '.jpg';
            $ruta = $imagen->storeAs('imagenes/administradores', $nuevo_nombre, 'public');
            $admin->imagen = '/storage/' . $ruta;
            $admin->save();
        }

        return redirect('/admins/listado')->with('hecho', 'Administrador actualizado exitosamente');
    }

    public function destroy($id)
    {
        $admin = Administradores::find($id);

        $admin->delete();

        return redirect('/admins/listado')->with('hecho', 'Administrador eliminado');
    }
}
