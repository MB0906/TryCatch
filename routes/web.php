<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogoController;
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

Route::get('/registrar',[RegisterController::class,'create'])
    ->middleware('guest')
    ->name('registrar.index');

Route::post('/registrar',[RegisterController::class,'store'])
    ->name('registrar.store');

Route::get('/ingresar',[SessionsController::class,'create'])
    ->middleware('guest')
    ->name('ingresar.index');

Route::post('/ingresar',[SessionsController::class,'store'])
    ->name('ingresar.store');

Route::get('/cerrarSesion',[SessionsController::class,'destroy'])
    ->middleware('auth')
    ->name('ingresar.destroy');

Route::get('/admin',[AdminController::class,'index'])
    ->middleware('auth.admin')
    ->name('admin.index');


Route::get('/catalogo', [ProductosController::class,'index'])
    ->name('catalogo.index');

Route::resource('producto',ProductosController::class)
    ->middleware('auth.admin');

Route::get('/catalogo/create',[CatalogoController::class,'create'])
    ->middleware('auth.admin');

Route::post('catalogo',[CatalogoController::class,'store'])
    ->middleware('auth.admin');

/*Route::resource('admin',AdminController::class)
    ->middleware('auth.admin');
*/
