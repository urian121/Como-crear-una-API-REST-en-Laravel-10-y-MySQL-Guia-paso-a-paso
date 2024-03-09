<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    public function index()
    {
        try {
            $empleados = Empleado::all();
            return response()->json($empleados, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los empleados: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            /* 
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
        */

            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->cedula = $request->cedula;
            $empleado->edad = $request->edad;
            $empleado->sexo = $request->sexo;
            $empleado->telefono = $request->telefono;
            $empleado->cargo = $request->cargo;
            $empleado->save();
            return response()->json($empleado, 201);
            //return response()->json(['message' => 'Empleado creado correctamente','empleado' => $empleado]);
        } catch (\Exception $e) {
            // En caso de que ocurra una excepción, manejarla adecuadamente
            return response()->json(['error' => 'Error al crear el empleado: ' . $e->getMessage()], 500);
        }
    }


    public function show($IdEmpleado)
    {
        try {
            $empleado = Empleado::findOrFail($IdEmpleado);
            return response()->json($empleado, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }
    }


    public function update(Request $request, $IdEmpleado)
    {
        try {
            /*
        $empleado = Empleado::findOrFail($IdEmpleado);
        $empleado->update($request->all());

        return response()->json($empleado, 200);
        */

            // Actualizar los demás campos del empleado
            $datoEmpleado = Empleado::findOrFail($IdEmpleado);
            $datoEmpleado->nombre = $request->nombre;
            $datoEmpleado->cedula = $request->cedula;
            $datoEmpleado->edad = $request->edad;
            $datoEmpleado->sexo = $request->sexo;
            $datoEmpleado->telefono = $request->telefono;
            $datoEmpleado->cargo = $request->cargo;
            $datoEmpleado->save();
            return response()->json($datoEmpleado, 200);
        } catch (\Exception $e) {
            // En caso de que ocurra una excepción, manejarla adecuadamente
            return response()->json(['error' => 'Error al actualizar el empleado: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($IdEmpleado)
    {
        try {
            $empleado = Empleado::findOrFail($IdEmpleado);
            $empleado->delete();
            return response()->json(['message' => 'Empleado eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el empleado: ' . $e->getMessage()], 500);
        }
    }
}
