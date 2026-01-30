<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    //
    public function listar() {
        //
        $servicios = Servicios::all();
        return view('servicios.listado', compact('servicios'));
        //return $servicios;
    }

    public function create() {
        //
        return view('servicios.formulario-crear');
    }
}
