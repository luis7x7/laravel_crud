<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    //crear

    public function addcategoria(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado_registro = $request->estado_registro;

        $data = $categoria->save();
        if (!$data) {
            return response()->json([
                'status' => 400,
                'message' => 'error de insercion'
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => ' exito de insercion en categoria'
            ]);
        }
    }



    //leer

    public function mostrartodo()
    {
        $categoria = Categoria::all();
        return response()->json($categoria);
    }

    //actualizar
    public function update_categoria(Request $request, $id)
    {

        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json([
                'status' => '400',
                'message' => 'error  al actualizar'
            ]);
        } else {
            $categoria->update($request->all());
            $categoria->update(['updated_at' => now()]);

            return response()->json([
                'status' => '200',
                'message' => 'exito al actualizar Categoria'
            ]);
        }
    }

    //eliminar


    public function eliminar_categoria($id)
    {

        $categoria = Categoria::find($id);


        if (!$categoria) {
            return response()->json([
                'status' => '400',
                'message' => 'error  al actualizar'
            ]);
        } else {
            $categoria->delete();
            // $persona->estado_registro = 'I';
            // $persona->save();
            return response()->json([
                'status' => '200',
                'message' => 'exito  al eliminar Categoria'
            ]);
        }


    }


    // PATCH

    public function changeStateActive(Request $request, $id)
    {

        $categoria = Categoria::find($id);

        if (!$categoria) {

            return response()->json([

                'message' => 'Categoria no encontrada',
                'status' => 404

            ]);

        } else {

            $categoria->estado_registro = $request->estado_registro;
            ;
            $categoria->save();

            return response()->json([

                'message' => 'Estado del Categoria actualizado',
                'status' => 200

            ]);

        }


    }
}