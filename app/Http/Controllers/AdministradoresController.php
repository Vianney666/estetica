<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class AdministradoresController extends Controller
{
    public function listar()
    {   //listado de registros

        $admins = Administradores::all();  //select * from administradores
        //return $usuarios;
        return view('administradores.listado', compact('admins'));
    }
}
