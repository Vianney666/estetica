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

}
