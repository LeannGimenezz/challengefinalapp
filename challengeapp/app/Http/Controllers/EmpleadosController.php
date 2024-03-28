<?php

namespace App\Http\Controllers;

use App\Mail\MailSennder;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmpleadosController extends Controller
{
    public function index()
    {
        return Empleado::all();
    }

    public function store(Request $request)
    {

        $inputs = $request->input();
        $emp = Empleado::create($inputs);
        Mail::to($emp)->send(new MailSennder());
        return response()->json([
            'data' => $emp,
            'mensaje' => "Creado con exito",
        ]);
    }
    public function show($id)
    {
        $emp = Empleado::find($id);
        if (isset($emp)) {
            return response()->json([
                'data' => $emp,
                'mensaje' => "Empleado encontrado",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el empleado",
            ]);
        }
    }



    public function update(Request $request, $id)
    {
        $emp = Empleado::find($id);
        if (isset($emp)) {
            $emp->nombre = $request->nombre;
            $emp->apellido = $request->apellido;
            $emp->foto = $request->foto;
          $emp->email = $request->email;
           $emp->password =Hash::make($request->password);
            if ($emp->save()) {
                return response()->json([
                    'data' => $emp,
                    'mensaje' => "Actualizado con exito",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No existe el empleado",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el empleado",
            ]);
        }
    }



    public function destroy($id)
    {
        $emp = Empleado::find($id);
        if (isset($emp)) {
            $res = Empleado::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $emp,
                    'mensaje' => "Empleado eliminado con exito",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No existe el empleado",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el empleado",
            ]);
        }
    }
}
