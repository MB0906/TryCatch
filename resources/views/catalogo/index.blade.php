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
            <h2>Categorias</h2>
            @if($categorias->count() > 0)
                @foreach ($categorias as $categoria)
                        <table class="table table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre de la categoria</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td><a class="btn btn-primary"  href="{{ url('/catalogo/'.$categoria->id.'/edit') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a></td>
                                        <form action="{{ url('/catalogo/'.$categoria->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <td><button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta categoria?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg></button></td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                @endforeach
                <div class="row m-0 text-center align-items-center justify-content-center">
                    <div class="col-auto">
                        <a  class=" btn btn-primary  " href="{{ url('/admin') }}">Regresar</a>
                    </div>
                </div>
                @else
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss='alert'>&times;</button>
                    <strong>¡Peligro!</strong> No hay categorias creadas.
                </div>
                @endif
    @endsection
