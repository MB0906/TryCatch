<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function () {
    return view('home');
});

/*     RUTAS REGISTER        */
Route::get('/registrar',[RegisterController::class,'create'])
    ->middleware('guest')
    ->name('registrar.index');

Route::post('/registrar',[RegisterController::class,'store'])
    ->name('registrar.store');

/*     RUTAS SESSIONS        */

Route::get('/ingresar',[SessionsController::class,'create'])
    ->middleware('guest')
    ->name('ingresar.index');

Route::post('/ingresar',[SessionsController::class,'store'])
    ->name('ingresar.store');

Route::get('/cerrarSesion',[SessionsController::class,'destroy'])
    ->middleware('auth')
    ->name('ingresar.destroy');

/*     RUTAS ADMIN        */

Route::get('/admin',[AdminController::class,'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

/*     RUTAS PRODUCTOS        */

Route::get('productoI',[ProductosController::class,'index'])
    ->name('producto.index');

Route::get('/producto/create',[ProductosController::class,'create'])
    ->middleware('auth.admin');

Route::post('producto',[ProductosController::class,'store'])
    ->middleware('auth.admin');

Route::patch('/producto/{producto}',[ProductosController::class,'update'])
    ->middleware('auth.admin');

Route::get('/producto/{producto}/edit',[ProductosController::class,'edit'])
    ->middleware('auth.admin');

Route::delete('/producto/{producto}',[ProductosController::class,'destroy'])
    ->middleware('auth.admin');





/*     RUTAS CATALOGO        */

Route::get('catalogoI',[CatalogoController::class,'index']);

Route::get('/catalogo/create',[CatalogoController::class,'create'])
    ->middleware('auth.admin');

Route::post('catalogo',[CatalogoController::class,'store'])
    ->middleware('auth.admin');

Route::patch('/catalogo/{catalogo}',[CatalogoController::class,'update'])
    ->middleware('auth.admin');

Route::get('/catalogo/{catalogo}/edit',[CatalogoController::class,'edit'])
    ->middleware('auth.admin');

Route::delete('/catalogo/{catalogo}',[CatalogoController::class,'destroy'])
    ->middleware('auth.admin');

/*     RUTAS CONTACTO        */
Route::get('contacto',[ContactoController::class,'index'])
    ->name('contacto.index');

Route::post('contacto',[ContactoController::class,'store']);
