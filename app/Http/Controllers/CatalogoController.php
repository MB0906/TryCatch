<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Productos;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosC=Catalogo::all();
        return view('catalogo.index',['categorias'=>$datosC]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createC');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catalogo=[
            'nombre'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$catalogo,$mensaje);

        $datosCatalogo = request()->except('_token');

             Catalogo::insert($datosCatalogo);

        return redirect('admin')->with('mensaje','Se ha registrado correctamente la categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias=Catalogo::find($id);
        return view('catalogo.edit',['categoria'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=[
            'nombre'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request,$datos,$mensaje);

        $datosCategoria = request()->except('_token','_method');

        Catalogo::where('id','=',$id)->update($datosCategoria);

        return redirect('/catalogoI')->with('mensaje','Se ha modificado correctamente la categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $catalogo = Catalogo::find($id);
        $catalogo ->productos()->each(function($productos){
            $productos->delete();
        });
        $catalogo -> delete();
        return redirect('/catalogoI')->with('mensaje-D','Se ha eliminado correctamente la categoria');
    }
}
