<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursales;

class SucursalesController extends Controller
{
    public function index()
    {
        $sucursales = Sucursales::all();
        return view('sucursales.listado', compact('sucursales'));
    }

    public function create()
    {
        return view('sucursales.formulario-crear');
    }

    public function store(Request $req)
    {
        $sucursal = new Sucursales();

        $sucursal->direccion = $req->direccion;
        $sucursal->longitud = $req->longitud;
        $sucursal->latitud = $req->latitud;
        $sucursal->imagen = $req->image;

        $sucursal->save(); //insert into

        return redirect('/sucursales/listado');
    }

    public function edit($id)
    {
        $sucursales = Sucursales::find($id);
        return view('sucursales.formulario-editar')->with('sucursales', $sucursales);
    }

    public function update(Request $req, $id)
    {
        $sucursal = Sucursales::find($id);

        $sucursal->direccion = $req->direccion;
        $sucursal->longitud = $req->longitud;
        $sucursal->latitud = $req->latitud;
        $sucursal->imagen = $req->image;

        $sucursal->save(); //insert into

        return redirect('/sucursales/listado');
    }

}
