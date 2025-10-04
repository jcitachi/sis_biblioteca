<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion'));
    }


    public function store(Request $request)
    {
        //
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'telefono'  => 'required|string|max:255',
            'email'     => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'logo'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //buscar si existe la configuración
        $configuracion = Configuracion::first();
        if ($configuracion) {
            $configuracion->nombre    = $request->nombre;
            $configuracion->telefono  = $request->telefono;
            $configuracion->correo     = $request->email;
            $configuracion->direccion = $request->direccion;

            if ($request->hasFile('logo')) {
                //eliminar logo anterior
                if ($configuracion->logo) {
                    if ($configuracion->logo) {
                        $rutaAnterior = public_path($configuracion->logo);
                        if (file_exists($rutaAnterior)) {
                            unlink($rutaAnterior);
                        }
                    }
                }
                //nuevo logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración actualizada correctamente.')
                ->with('icono', 'success');
        } else {
            //nueva configuración
            $configuracion = new Configuracion();
            $configuracion->nombre    = $request->nombre;
            $configuracion->telefono  = $request->telefono;
            $configuracion->correo     = $request->email;
            $configuracion->direccion = $request->direccion;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')
                ->with('mensaje', 'Configuración guardada correctamente.')
                ->with('icono', 'success');
        }
    }
}
