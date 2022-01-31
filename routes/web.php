<?php

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
->name('registrar.index');

Route::post('/registrar',[RegisterController::class,'store'])
->name('registrar.store');

Route::get('/ingresar',[SessionsController::class,'create'])
->name('ingresar.index');

Route::post('/ingresar',[SessionsController::class,'store'])
->name('ingresar.store');

Route::get('/cerrarSesion',[SessionsController::class,'destroy'])
->name('ingresar.destroy');
