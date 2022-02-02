@extends('layout.app')

    @section('content')

        <h3 align="center">¡Registrate!</h3>

            <div class="container">
                <form method="POST" action="">
                @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Ingrese un nombre de usuario</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Pedro de la paz">
                    </div>
                    @error('nombre')
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss='alert'>&times;</button>
                            <strong>{{ ($message) }}</strong>
                        </div>
                    @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Ingrese su correo electronico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Juanpedrodelapaz@gmail.com">
                        </div>
                    @error('email')
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss='alert'>&times;</button>
                            <strong>{{ ($message) }}</strong>
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Ingrese una contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********">
                    </div>
                    @error('password')
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss='alert'>&times;</button>
                            <strong>{{ ($message) }}</strong>
                        </div>
                    @enderror
                    <br/>
                    <div class="row m-0 text-center align-items-center justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-success" type="submit">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
    @endsection
