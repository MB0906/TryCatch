@extends('layout.app')

    @section('content')
        <div class="clearfix"></div>
            <div>
                @if (session('mensaje'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss='alert'>&times;</button>
                    <strong></strong> {{ session ('mensaje') }}.
                </div>
                @endif

                @if (session('mensaje-D'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss='alert'>&times;</button>
                    <strong>¡Cuidado!</strong> {{ session ('mensaje-D') }}.
                </div>
                @endif
            </div>
                @if($categorias->count() > 0)
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
                                            <th>Editar</th>
                                            <th>Borrar</th>
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
                                                            @if (auth()->check())
                                                                @if (auth()->user()->rol=='admin')
                                                                    <td><a class="btn btn-primary"  href="{{ url('/producto/'.$producto->id.'/edit') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                    </svg></a></td>
                                                                    <form action="{{ url('/producto/'.$producto->id)}}" method="POST" >
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <td><button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este producto?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                        </svg></button></td>
                                                                    </form>
                                                                @endif
                                                            @endif
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
                    @else
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong>¡Lo sentimos!</strong> No hay stock.
                    </div>
                @endif
    @endsection
