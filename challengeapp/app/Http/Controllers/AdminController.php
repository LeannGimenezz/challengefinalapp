<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $inputs = $request->input();
        $inputs["password"] = Hash::make(trim($request->password));

        $admin = User::create($inputs);
        return response()->json([
            'data' => $admin,
            'mensaje' => "Registrado con exito",
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id){
        $admin = User::find($id);
        if(isset($admin)){
            return response()->json([
                'data' => $admin,
                'mensaje' => "Encontrado con exito",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No se encontro",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
   
     public function update(Request $request, $id)
     {
         $admin = User::find($id);
         if (isset($admin)) {
             $admin->name = $request->name;
             $admin->email = $request->email;
             $admin->password =Hash::make($request->password);
             if ($admin->save()) {
                 return response()->json([
                     'data' => $admin,
                     'mensaje' => "Actualizado con exito",
                 ]);
             } else {
                 return response()->json([
                     'error' => true,
                     'mensaje' => "No Se actualizo",
                 ]);
             }
         } else {
             return response()->json([
                 'error' => true,
                 'mensaje' => "No existe",
             ]);
         }
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $admin = User::find($id);
        if(isset($admin)){
            $res = User::destroy($id);
            if($res){
                return response()->json([
                    'data' => $admin,
                    'mensaje' => "Eliminado con exito",
                ]);
            }else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No existe",
                ]);
            }
        }else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe",
            ]);
        } 
       
    
}
}
