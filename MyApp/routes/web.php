<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LLamadaController;
use App\Http\Controllers\OperacionesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ArchivosFotograficosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view("index");
});

Route::get('/contact', function () {
    return view("contac");
});

Route::get('/saludo/{nombre}', function ($nombre) {
    return "Hola " . $nombre;
});

Route::get('/saludo/{nombre}/{edad}', function ($nombre,$edad) {
    return "Hola " . $nombre . " tienes " . $edad . " años.";
});

Route::get('admin/post/exemple',array('as' => 'admin.home', function () {
    $url = route('admin.home');
    return "this url is " . $url;
}));

Route::get('/saludo/{nombre}/{edad}', function ($nombre,$edad) {
    return "Hola " . $nombre . " tienes " . $edad . " años.";
});

Route::resource('/post',PostController::class);
Route::resource('/post',PostController::class) ->names(
    ['create' => 'post.create']
);
Route::get('/llamada',[LLamadaController::class,'index']);
Route::get('/llamada/edit/{id}',[LLamadaController::class,'edit']);
Route::get('/llamada/show/{nombre}/{edad}',[LLamadaController::class,'show']);


Route::get('/operaciones/suma/{n1}/{n2}',[OperacionesController::class,'suma']);
Route::get('/operaciones/resta/{n1}/{n2}',[OperacionesController::class,'resta']);
Route::get('/operaciones/multiplicacion/{n1}/{n2}',[OperacionesController::class,'multiplicacion']);
Route::get('/operaciones/division/{n1}/{n2}',[OperacionesController::class,'division']);


//Route::resource('/post/{id}',PostController::class);
//Route::resource('/post/{id}/edit',PostController::class);

Route::get('post/contactPost',[PostController::class,'contact']);

Route::get('/post/contactPost','PostController@contact');
Route::get('/post/showData','PostController@showData');

Route::get('/llamada/blades',[LLamadaController::class,'blades']);

Route::get('/indexProducts',[ProductsController::class,'index']);
Route::get('/editProduct/{id}',[ProductsController::class,'edit']);
Route::put('/updateProduct',[ProductsController::class,'update']);
Route::get('/deleteProduct/{id}',[ProductsController::class,'eliminaProducto']);



Route::get('/Employees',[ProductsController::class,'listaEmployees']);
Route::get('/editEmployees/{id}',[ProductsController::class,'editEmployees']);
Route::put('/updateEmployees',[ProductsController::class,'updateEmployees']);
Route::get('/deleteEmployees/{id}',[ProductsController::class,'eliminaEmpleado']);


Route::get('/indexArchivosFotograficos',[ArchivosFotograficosController::class,'index']);
Route::post('/guardarArchivoFotografico','App\Http\Controllers\ArchivosFotograficosController@store');