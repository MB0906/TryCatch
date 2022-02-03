<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $datosU=User::all();
        $usuario=[
            'nombre'=>'required|max:100',
            'email'=>'required|max:250|email|unique:users,email',
            'password'=>'required|max:100|confirmed'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido.',
            'email.required'=>'Es requerido el email para crear el usuario.',
            'password.required'=>'Es requerida una contraseña para crear el usuario.'
        ];

        $this->validate($request,$usuario,$mensaje);

        $datosUsuario = request()->except('_token','password_confirmation');

            User::create($datosUsuario);
            return redirect('/ingresar')->with('mensaje','Se ha creado correctamente el usuario');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
