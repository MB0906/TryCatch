<!doctype html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/contacto.js"></script>
    <!-- Bootstrap CSS -->
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/trycatch.css') }}" rel="stylesheet">

    <title>TryCatch</title>
  </head>
  <body>
    <div id="Contenedor">
        <header> <h1> TryCatch™ </h1> </header>
        <nav>
            <ul>
            @if(auth()->check())
                @if (auth()->user()->rol=='admin')
                    <li class="nav-item ">
                        <a href="/admin"> Portal Admin </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('producto.index') }}"> Catalogo</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link">Bienvenido <b>{{ auth()->user()->nombre}}</b> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('ingresar.destroy') }}">Cerrar Sesión</a>
                    </li>
                @else
                <li>
                    <a href="/"> Inicio </a>
                </li>
                <li>
                    <a href="{{ route('producto.index') }}"> Catalogo</a>
                </li>
                <li>
                    <a href="{{ route('contacto.index') }}"> Contactanos </a>
                </li>
                <div style="float:right">
                <li class="nav-item ">
                    <a class="nav-link">Bienvenido <b>{{ auth()->user()->nombre}}</b> </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('ingresar.destroy') }}">Cerrar Sesión</a>
                </li>
                </div>
                @endif
            @else
                <li><a href="/"> Inicio </a></li>
                <li><a href="{{ route('producto.index') }}"> Catalogo</a></li>
                <li><a href="{{ route('contacto.index') }}"> Contactanos </a></li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('ingresar.index') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registrar.index') }}">Registrarse</a>
                </li>

            @endif
            </ul>
        </nav>
    </br>
    @yield('content')
    </br>
    <div class="clearfix"></div>
    <footer> TryCatch™ </footer>
  </body>
</html>
