<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        return view('servicios.listado', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.formulario-crear');
    }

    public function store(Request $req)
    {
        $servicio = new Servicios();

        $servicio->nombre_servicio = $req->nombre_servicio;
        $servicio->descripcion = $req->descripcion;
        $servicio->categoria = $req->categoria;
        $servicio->duracion_minutos = $req->duracion_minutos;
        $servicio->precio = $req->precio;
        $servicio->imagen = $req->imagen;

        $servicio->save(); //insert into

        if ($req->has('imagenes')) {
            $imagenes = $req->file('imagenes');
            $rutas = [];

            foreach ($imagenes as $index => $imagen) {
                $nuevo_nombre = 'servicio_' . $servicio->id . '_' . $index . '.jpg';
                $ruta = $imagen->storeAs('imagenes/servicios', $nuevo_nombre, 'public');
                $rutas[] = '/storage/' . $ruta;
            }


            $servicio->imagen = implode(',', $rutas);
            $servicio->save();
        }

        return redirect('/servicios/listado');
    }

    public function edit($id)
    {
        $servicios = Servicios::find($id);
        return view('servicios.formulario-editar')->with('servicios', $servicios);
    }

    public function update(Request $req, $id)
    {
        $servicio = Servicios::find($id);

        $servicio->nombre_servicio = $req->nombre_servicio;
        $servicio->descripcion = $req->descripcion;
        $servicio->categoria = $req->categoria;
        $servicio->duracion_minutos = $req->duracion_minutos;
        $servicio->precio = $req->precio;
        $servicio->imagen = '/imagenes/servicios/servicio_default.jpg';

        $servicio->save(); //insert into



        return redirect('/servicios/listado');
    }

    public function destroy($id)
    {
        $servicio = Servicios::find($id);

        $servicio->delete();

        return redirect('/servicios/listado')->with('hecho', 'Servicio eliminado');
    }
}
