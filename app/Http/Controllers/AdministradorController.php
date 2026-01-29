<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradorController extends Controller
{
    public function index() {   //listado de registros

      $admins = Administrador::all();  //select * from administradores
      //return $usuarios;
     //aqui m quede  return view('/admins/listado')


    }
}
