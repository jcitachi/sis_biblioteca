<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'codigo'    => 'required|unique:estudents,codigo',
            'dni'       => 'required|unique:estudents,dni',
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'carrera'   => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono'  => 'required|string|max:20',
            'estado'    => 'required|in:0,1', // si solo aceptas Activo/Inactivo
        ]);

        $estudiante = new Estudiante();
        $estudiante->codigo    = $request->codigo;
        $estudiante->dni       = $request->dni;
        $estudiante->nombres   = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->carrera   = $request->carrera;
        $estudiante->direccion = $request->direccion;
        $estudiante->telefono  = $request->telefono;
        $estudiante->estado    = $request->estado;
        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Estudiante creado exitosamente.')
            ->with('icono', 'success');
    }


    public function edit($id)
    {
        //
        $estudiante = Estudiante::find($id);
        return view('admin.estudiantes.edit', compact('estudiante'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'codigo'    => 'required|unique:estudents,codigo,' . $id,
            'dni'       => 'required|unique:estudents,dni,' . $id,
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'carrera'   => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono'  => 'required|string|max:20',
            'estado'    => 'required|in:0,1', // si solo aceptas Activo/Inactivo
        ]);
        $estudiante = Estudiante::find($id);
        $estudiante->codigo    = $request->codigo;
        $estudiante->dni       = $request->dni;
        $estudiante->nombres   = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->carrera   = $request->carrera;
        $estudiante->direccion = $request->direccion;
        $estudiante->telefono  = $request->telefono;
        $estudiante->estado    = $request->estado;
        $estudiante->save();
        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Estudiante actualizado exitosamente.')
            ->with('icono', 'success');
    }


    public function destroy($id)
    {
        //
    }
}
