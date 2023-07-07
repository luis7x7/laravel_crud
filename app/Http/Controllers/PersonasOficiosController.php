<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Oficios;
use App\Models\Personas_Oficios;
use Illuminate\Http\Request;

class PersonasOficiosController extends Controller
{
    // CREATE

    public function addOfiPerson(Request $request)
    {

        $oficioPer = new Personas_Oficios();

        $oficioPer->persona_id = $request->persona_id;
        $oficioPer->oficio_id = $request->oficio_id;

        $data = $oficioPer->save();

        if (!$data) {

            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal'

            ]);

        } else {

            return response()->json([

                'status' => 200,
                'message' => 'Datos agregados correctamente'

            ]);

        }

    }

    // READ

    public function mostrarTodo()
    {

        $personas = Personas::with('Oficios')->get();

        return response()->json([

            'personas' => $personas

        ]);

    }

    // UPDATE

    public function updateData(Request $request, $id)
    {

        $oficioPer = Personas_Oficios::find($id);

        if (!$oficioPer) {

            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal al actualizar estos datos'

            ]);

        } else {

            $oficioPer->update($request->all());
            $oficioPer->update(['updated_at' => now()]);

            return response()->json([

                'status' => 200,
                'message' => 'Se actualizaron los datos correctamente'

            ]);

        }

    }

    // DELETE

    public function deleteData($id)
    {

        $oficioPer = Personas_Oficios::find($id);

        if (!$oficioPer) {

            return response()->json(
                [
                    'message' => 'elimnar no encontrada',
                    'status' => 404
                ]
            );

        } else {

            $oficioPer->delete();
            // $oficioPer->save();

            return response()->json(

                [

                    'message' => 'El estado del registro a sido eliminado',
                    'status' => 200

                ]

            );

        }

    }
}