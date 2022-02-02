@extends('layout.app')

    @section('content')
    <div class="clearfix"></div>
        <form action="{{ url('producto/'.$producto->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            <h3 align='center'>¡Modificar Producto!</h3>
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

                @if(isset($producto->Imagen))
                    <label>  Imagen actual</label>
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
                <button class="btn btn-success" type="submit" id="modificarProducto">Modificar Producto</button>
                <a  class=" btn btn-primary  " href="{{ url('/productoI') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
