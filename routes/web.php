<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

//dependencia al controlador



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
    return view('welcome');
});


Route::get('prueba' , function(){
   return view('productos.new');
});

//Rutas REST
Route::resource('productos', ProductoController::class);