@extends('layout.app')

    @section('content')
        <div class="clearfix"></div>
                @foreach ($categorias as $categoria)
                    @if ($categoria->productos->count() > 0)
                        <h2>{{$categoria->nombre}}</h2>
                            <table class="table table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Foto Referencial</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                    @foreach ($productos as $producto)
                                        @if($producto->catalogo_id == $categoria->id)
                                            <tbody>
                                                <tr>
                                                    <td><img src="{{ asset('storage').'/'.$producto->Imagen }}" alt="100px" width="150px" class="img-thumbnail img-fluid"></td>
                                                    <td>{{ $producto->Nombre }}</td>
                                                    <td>{{ $producto->Descripcion }}</td>
                                                    <td>{{ $producto->Precio }}</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                            </table>
                    @else
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong>¡Lo sentimos!</strong> No tenemos stock de {{ $categoria->nombre }}.
                    </div>
                    @endif
                @endforeach
    @endsection
