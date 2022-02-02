@extends('layout.app')

    @section('content')

    <form action="{{ url('/catalogo/'.$categoria->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <div class="container">
            <h3 align='center'>¡Modifica la Categoria!</h3>
                @if(count($errors)>0)
                <div class="alert alert-danger alert-dismissable">
                    <ul>
                        @foreach( $errors->all() as $error)
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong>{{ $error }}</strong>
                        @endforeach
                    </ul>
                </div>
                @endif
            <label>Ingrese el nuevo nombre del la categoria</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ isset($categoria->Nombre)?$categoria->nombre:old('nombre') }}">
            <br/><br/>
            <div class="row m-0 text-center align-items-center justify-content-center">
                <div class="col-auto">
                    <button class="btn btn-success" type="submit" id="crearProducto">Modificar Categoria</button>
                    <a  class=" btn btn-primary  " href="{{ url('/catalogoI') }}">Regresar</a>
                </div>
            </div>
        </div>
    </form>
    @endsection
