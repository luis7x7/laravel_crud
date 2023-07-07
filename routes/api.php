<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CategoriasOficiosController;
use App\Http\Controllers\oficiosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PersonasOficiosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//personas
Route::get('personas/getall', [PersonasController::class, 'mostrarTodo']);
Route::post('personas/insertar-data', [PersonasController::class, 'addPerson']);
Route::delete('personas/{id}', [PersonasController::class, 'deletePerson']);
Route::put('personas/{id}', [PersonasController::class, 'updatePerson']);
Route::patch('personas/{id}', [PersonasController::class, 'changeStateActive']);

//oficios

Route::get('oficios/getall', [oficiosController::class, 'mostrartodo']);
Route::post('oficios/insertar-data', [oficiosController::class, 'addoficio']);
Route::delete('oficios/{id}', [oficiosController::class, 'eliminar_oficio']);
Route::put('oficios/{id}', [oficiosController::class, 'update_oficios']);
Route::patch('oficios/{id}', [oficiosController::class, 'changeStateActive']);

//ofico y persona

Route::get('oficioPer/getall', [PersonasOficiosController::class, 'mostrarTodo']);
Route::post('oficioPer/insertar', [PersonasOficiosController::class, 'addOfiPerson']);
Route::delete('oficioPer/{id}', [PersonasOficiosController::class, 'deleteData']);
Route::put('oficioPer/{id}', [PersonasOficiosController::class, 'updateData']);


//categoria
Route::get('categorias/getall', [CategoriasController::class, 'mostrartodo']);
Route::post('categoria/insertar', [CategoriasController::class, 'addcategoria']);
Route::delete('categoria/{id}', [CategoriasController::class, 'eliminar_categoria']);
Route::put('categoria/{id}', [CategoriasController::class, 'update_categoria']);
Route::patch('categoria/{id}', [CategoriasController::class, 'changeStateActive']);

//categoria y oficio
Route::get('catofi/getall', [CategoriasOficiosController::class, 'mostrartodo']);
Route::post('catofi/insertar', [CategoriasOficiosController::class, 'addcategoriaoficio']);
Route::delete('catofi/{id}', [CategoriasOficiosController::class, 'deletedata']);
Route::put('catofi/{id}', [CategoriasOficiosController::class, 'updateData']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});