<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DB;
use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{

    //agregar
    public function addPerson(Request $request)
    {

        $persona = new Personas();

        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->nombre = $request->nombre;
        $persona->celular = $request->celular;

        $data = $persona->save();

        if (!$data) {

            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal'

            ]);

        } else {

            return response()->json([

                'status' => 200,
                'message' => 'Insetado con exito'

            ]);

        }

    }



    //LEER
    public function mostrarTodo()
    {
        $personas = Personas::all();
        // $personas = Persona::get();
        return response()->json($personas);
    }

    // UPDATE

    public function updatePerson(Request $request, $id)
    {

        $persona = Personas::find($id);

        if (!$persona) {

            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal'

            ]);

        } else {

            $persona->update($request->all());
            $persona->update(['updated_at' => now()]);

            return response()->json([

                'status' => 200,
                'message' => 'Actualizado correctamente'

            ]);

        }

    }

    //eliminar
    public function deletePerson($id)
    {

        $persona = Personas::find($id);

        if (!$persona) {

            return response()->json(
                [
                    'message' => 'Persona no encontrada',
                    'status' => 404
                ]
            );

        } else {

            $persona->delete();
            // $persona->estado_registro = 'I';
            // $persona->save();

            return response()->json(

                [

                    'message' => 'Persona eliminada exitosamente',
                    'status' => 200

                ]

            );

        }
    }



    //actualizar
    public function changeStateActive(Request $request, $id)
    {

        $persona = Personas::find($id);

        if (!$persona) {

            return response()->json([

                'message' => 'Persona no encontrada',
                'status' => 404

            ]);

        } else {


            $persona->estado_registro = $request->estado_registro;
            $persona->save();

            return response()->json([

                'message' => 'Estado de la persona actualizado',
                'status' => 200

            ]);

        }


    }







}