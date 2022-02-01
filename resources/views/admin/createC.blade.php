@extends('layout.app')

    @section('content')

    <form action="{{ url('catalogo') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="container">
            <h3 align='center'>¡Ingresar Producto!</h3>

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach( $errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <label>Ingrese el nombre del la categoria</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ isset($categoria->Nombre)?$categoria->nombre:old('nombre') }}">
            <br/><br/>
            <button class="btn btn-success" type="submit" id="crearProducto">Registrar Producto</button>
            <a  class=" btn btn-primary  " href="{{ url('admin') }}">Regresar</a>
        </div>
    </form>
    @endsection
