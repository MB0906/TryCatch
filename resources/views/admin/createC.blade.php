@extends('layout.app')

    @section('content')

    <form action="{{ url('catalogo') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="container">
            <h3 align='center'>¡Ingresar Categoria!</h3>
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
            <label>Ingrese el nombre del la categoria</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ isset($categoria->Nombre)?$categoria->nombre:old('nombre') }}" autocomplete="off">
            <br/><br/>
            <div class="row m-0 text-center align-items-center justify-content-center">
                <div class="col-auto">
                    <button class="btn btn-success" type="submit" id="crearProducto">Registrar Categoria</button>
                    <a  class=" btn btn-primary  " href="{{ url('admin') }}">Regresar</a>
                </div>
            </div>
        </div>
    </form>
    @endsection
