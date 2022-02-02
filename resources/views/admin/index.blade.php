@extends('layout.app')

    @section('content')
        <div class="container">
            <div>
                @if (session('mensaje'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong></strong> {{ session ('mensaje') }}.
                    </div>
                @endif

                @if (session('mensaje-D'))
                    <h6 class="alert alert-danger">{{ session ('mensaje-D') }}</h6>
                @endif
            </div>
        <h2 align="center">Portal del Admin</h2>
        <ul>
            <h4>Opciones</h4>
        </br>
            <td class="nav-item">
                <a class="btn btn-success" aria-current="page" href="/producto/create">Ingresar Producto</a>
            </td>
            <td class="nav-item">
                <a class="btn btn-success" aria-current="page" href="/catalogo/create">Crear Categoria</a>
            </td>
            </br></br>
            <a class="btn btn-warning" aria-current="page" href="/productoI">Modificar Producto</a>
            </td><td class="nav-item">

             <a class="btn btn-warning" aria-current="page" href="/catalogoI">Modificar Categoria</a>
            </td><td class="nav-item">

        </ul>
    @endsection
