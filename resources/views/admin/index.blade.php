@extends('layout.app')

    @section('content')
        <div class="container">
            <div>
                @if (session('mensaje'))
                    <h6 class="alert alert-success">{{ session ('mensaje') }}</h6>
                @endif

                @if (session('mensaje-D'))
                    <h6 class="alert alert-danger">{{ session ('mensaje-D') }}</h6>
                @endif
            </div>
        <h2>Portal del Admin</h2>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/producto/create">Ingresar Producto</a>
        </li>
    @endsection
