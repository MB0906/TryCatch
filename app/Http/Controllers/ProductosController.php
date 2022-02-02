<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosC=Catalogo::all();
        $datos=Productos::all();
            return view('catalogo',['productos'=>$datos, 'categorias'=>$datosC]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Productos::all();
        $categorias = Catalogo::all();
        return view('admin.create',['productos'=>$productos, 'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=[
            'Nombre'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Precio'=>'required',
            'Imagen'=>'required|max:10000|mimes:jpg,jpeg,png',
            'catalogo_id'=>'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido.',
            'Descripcion.required'=>'Una breve descripcion es necesaria.',
            'Precio.required'=>'Es requerido el precio para poder ingresar el producto.',
            'Imagen.required'=>'La imagen no esta seleccionada.',
            'catalogo_id.required'=>'Selecciona la categoria, si no creela.'
        ];

        $this->validate($request,$producto,$mensaje);

        $datosProducto = request()->except('_token');

            if($request->hasFile('Imagen')){
                $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
            }

            Productos::insert($datosProducto);

        return redirect('admin')->with('mensaje','Se ha registrado correctamente el producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Productos::find($id);
        $categorias=Catalogo::all();
        return view('admin.edit',compact('producto'),compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=[
            'Nombre'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Precio'=>'required',
            'Imagen'=>'required|max:10000|mimes:jpg,jpeg,png',
            'catalogo_id'=>'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Descripcion.required'=>'Una breve descripcion es necesaria',
            'Precio.required'=>'Es requerido el precio para poder ingresar el producto',
            'Imagen.required'=>'La imagen no esta seleccionada',
            'catalogo_id.required'=>'Selecciona la categoria, si no creela.'
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|max:10000|mimes:jpg,jpeg,png'];
            $mensaje=['Imagen.required'=>'El formato de la imagen no es jpg,jpeg o png'];
        }

        $this->validate($request,$datos,$mensaje);

        $datosProducto = request()->except('_token','_method');

        if($request->hasFile('Imagen')){
            $producto=Productos::find($id);
            Storage::delete('public/'.$producto->Foto);
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Productos::where('id','=',$id)->update($datosProducto);

        return redirect('/productoI')->with('mensaje','Se ha modificado correctamente el producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Productos::find($id);

        if(Storage::delete('public/'.$producto->Imagen)){

            Productos::destroy($id);

        }

        return redirect('/productoI')->with('mensaje-D','Se ha eliminado correctamente el producto');
    }


}
