<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursales;

class SucursalesController extends Controller
{
    public function index()
    {
        $sucursales = Sucursales::all();
        //return $sucursales;
        return view('sucursales.listado', compact('sucursales'));
    }

    public function create()
    {
        return view('sucursales.formulario-crear');
    }

    public function store(Request $req)
    {
        //return $req->all();
        $sucursal = new Sucursales();

        $sucursal->direccion = $req->direccion;
        $sucursal->longitud = $req->longitud;
        $sucursal->latitud = $req->latitud;
        $sucursal->imagen = $req->image;

        $sucursal->save(); //insert into

        return redirect('/sucursales/listado');
    }

}
