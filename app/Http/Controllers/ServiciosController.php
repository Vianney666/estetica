<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    //
    public function index() {
        //
        $servicios = Servicios::all();
        return view('servicios.listado', compact('servicios'));
        //return $servicios;
    }

    public function create()
    {
        return view('servicios.formulario-crear');
    }

    public function store(Request $req)
    {
        //return $req->all();
        $servicio = new Servicios();

        $servicio->nombre_servicio = $req->nombre_servicio;
        $servicio->descripcion = $req->descripcion;
        $servicio->categoria = $req->categoria;
        $servicio->duracion_minutos = $req->duracion_minutos;
        $servicio->precio = $req->precio;
        $servicio->imagen = $req->imagen;

        $servicio->save(); //insert into

        return redirect('/servicios/listado');
    }
}
