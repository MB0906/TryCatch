@extends('layout.app')

    @section('content')

    <form action="{{ url('/producto') }}" method="POST" enctype="multipart/form-data" >
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
            <label>Ingrese el nombre del producto</label>
                <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre') }}">
            <br/><br/>

            <label>Ingrese una breve descripción del producto</label>
                <textarea class="form-control" type="text" name="Descripcion" id="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion') }}"></textarea>
            <br/><br/>

            <label>Ingrese el valor del producto</label>
                <input class="form-control" type="int" name="Precio" id="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio') }}">
            <br/><br/>

            <label>Ingrese la imagen del producto</label>
            <br/><br/>

            @if(isset($producto->Foto))
                <label>  Foto actual</label>
                <img src="{{ asset('storage').'/'.$producto->Foto }}" alt="100px" width="150px" class="img-thumbnail img-fluid">
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

            <button class="btn btn-success" type="submit" id="crearProducto">Registrar Producto</button>
            <a  class=" btn btn-primary  " href="{{ url('admin') }}">Regresar</a>
        </div>
    </form>
    @endsection
