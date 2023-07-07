<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Oficios;
use App\Models\Categoria_Oficio;
use Illuminate\Http\Request;

class CategoriasOficiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcategoriaoficio(Request $request)
    {

        $catofi = new Categoria_Oficio();

        $catofi->categoria_id = $request->categoria_id;
        $catofi->oficio_id = $request->oficio_id;

        $data = $catofi->save();

        if (!$data) {
            return response()->json([

                'status' => 400,
                'message' => 'error al crear registro oficat'

            ]);
        } else {
            return response()->json([

                'status' => 200,
                'message' => 'exito al crear registro oficat'

            ]);
        }


    }


    public function mostrartodo()
    {
        $catofi = Categoria::with('Oficios')->get();
        return response()->json([

            'categoria' => $catofi
        ]);
    }


    public function updateData(Request $request, $id)
    {

        $catofi = Categoria_Oficio::find($id);
        if (!$catofi) {

            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal al actualizar estos datos'

            ]);
        } else {

            $catofi->update($request->all());
            $catofi->update(['updated_at' => now()]);

            return response()->json([
                'status' => 200,
                'message' => 'Se actualizaron los datos correctamente'
            ]);
        }
    }

    public function deletedata($id)
    {

        $catofi = Categoria_Oficio::find($id);

        if (!$catofi) {


            return response()->json([

                'status' => 400,
                'message' => 'Algo salio mal al eliminar estos datos'

            ]);
        } else {
            $catofi->delete();


            return response()->json([

                'status' => 200,
                'message' => 'registro catofi eliminado'

            ]);
        }


    }
}