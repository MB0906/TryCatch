@extends('layout.app')

    @section('content')

    <form action="{{ url('/producto') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="container">
            <h3 align='center'>¡Ingresar Producto!</h3>
                @if(count($errors)>0)
                    <div class="alert alert-danger alert-dismissable">
                        <ul>
                            <button type="button" class="close" data-dismiss='alert'>&times;</button>
                            @foreach( $errors->all() as $error)
                            <strong>{{ $error }}</br></strong>
                            @endforeach

                        </ul>
                    </div>
                @endif
            <label>Ingrese el nombre del producto</label>
                <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre') }}" autocomplete="off">
            <br/><br/>

            <label>Ingrese una breve descripción del producto</label>
                <textarea class="form-control" type="text" name="Descripcion" id="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion') }}" autocomplete="off"></textarea>
            <br/><br/>

            <label>Ingrese el valor del producto</label>
                <input class="form-control" type="number" name="Precio" id="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio') }}" autocomplete="off">
            <br/><br/>

            <label>Ingrese la imagen del producto</label>
            <br/>

            @if(isset($producto->Imagen))
                <label>  Foto actual</label>
                <img src="{{ asset('storage').'/'.$producto->Imagen }}" alt="100px" width="150px" class="img-thumbnail img-fluid">
                <br/><br/>
            @endif

            <input class="form-control" type="file" name="Imagen" id="Imagen">
            <br/><br/>

            <div class="mb-3">
                <label for="catalogo_id" class="form-label">Seleccione la categoria</label>
                <select name="catalogo_id" class="form-select">
                    @foreach ($categorias as $categoria )

                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>

                    @endforeach
                </select>
            </div>
            <div class="row m-0 text-center align-items-center justify-content-center">
                <div class="col-auto">
                    <button class="btn btn-success" type="submit" id="crearProducto">Registrar Producto</button>
                    <a  class=" btn btn-primary  " href="{{ url('admin') }}">Regresar</a>
                </div>
            </div>

        </div>
    </form>
    @endsection
