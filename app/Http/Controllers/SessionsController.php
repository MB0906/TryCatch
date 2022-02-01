<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Sessions;
use Illuminate\Http\Request;

class SessionsController extends Controller
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
        return view('auth.ingresar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(auth()->attempt(request(['email', 'password'])) == false){
            return back()->withErrors([
                'error'=> 'El email o la contraseña son incorrectas, intenta denuevo.'
            ]);
        }else{
            if(auth()->user()->rol=='admin'){
                return redirect()->route('admin.index');
            }else{
               return redirect('/');
            }
        }
    }

    public function show(Sessions $sessions)
    {
        //
    }

    public function edit(Sessions $sessions)
    {
        //
    }

    public function update(Request $request, Sessions $sessions)
    {
        //
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/ingresar');
    }
}
