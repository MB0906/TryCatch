@extends('layout.app')

    @section('content')

        <h3 align="center">¡Bienvenido!</h3>

            <div class="container">
                <form method="POST" action="">
                @csrf
                    @if (session('mensaje'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong></strong> {{ session ('mensaje') }}.
                    </div>
                @endif
                    @error('error')
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss='alert'>&times;</button>
                        <strong>{{ ($message) }}</strong>
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Ingrese su correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Juanpedrodelapaz@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Ingrese su contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div>
                    <br/>
                    <div class="row m-0 text-center align-items-center justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-success" type="submit">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
    @endsection
