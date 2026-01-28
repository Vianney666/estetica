<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuarioController extends Controller
{
    public function index() {   //listado de registros

      $usuarios = Usuario::all();  //select * from usuarios
      //return $usuarios;
     //aqui m quede  return view('/admins/listado')


    }
}
