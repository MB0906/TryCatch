<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store()
    {
        return redirect('contacto')->with('mensaje','Se ha avisado correctamente a un administrador');
    }
}
