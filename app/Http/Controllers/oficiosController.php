<?php


namespace App\Http\Controllers;

use App\Models\Oficios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class oficiosController extends Controller
{

     //crear

     public function addoficio(Request $request)
     {
          $oficio = new Oficios();
          $oficio->nombre = $request->nombre;
          $oficio->descripcion = $request->descripcion;
          $oficio->estado_registro =$request->estado_registro;

          $data = $oficio->save();
          if (!$data) {
               return response()->json([
                    'status' => 400,
                    'message' => 'error de insercion'
               ]);
          } else {
               return response()->json([
                    'status' => 200,
                    'message' => ' exito de insercion en oficio'
               ]);
          }
     }



     //leer

     public function mostrartodo()
     {
          $oficios = Oficios::all();
          return response()->json($oficios);
     }

     //actualizar
     public function update_oficios(Request $request, $id)
     {

          $oficio = Oficios::find($id);
          if (!$oficio) {
               return response()->json([
                    'status' => '400',
                    'message' => 'error  al actualizar'
               ]);
          } else {
               $oficio->update($request->all());
               $oficio->update(['updated_at' => now()]);

               return response()->json([
                    'status' => '200',
                    'message' => 'exito al actualizar oficios'
               ]);
          }
     }

     //eliminar


     public function eliminar_oficio($id)
     {

          $oficio = Oficios::find($id);


          if (!$oficio) {
               return response()->json([
                    'status' => '400',
                    'message' => 'error  al actualizar'
               ]);
          } else {
               $oficio->delete();
               // $persona->estado_registro = 'I';
               // $persona->save();
               return response()->json([
                    'status' => '200',
                    'message' => 'exito  al eliminar oficio'
               ]);
          }


     }


     // PATCH

     public function changeStateActive(Request $request, $id)
     {

          $oficio = Oficios::find($id);

          if (!$oficio) {

               return response()->json([

                    'message' => 'Oficio no encontrada',
                    'status' => 404

               ]);

          } else {

               $oficio->estado_registro = $request->estado_registro;
               ;
               $oficio->save();

               return response()->json([

                    'message' => 'Estado del oficio actualizado',
                    'status' => 200

               ]);

          }


     }
}
?>