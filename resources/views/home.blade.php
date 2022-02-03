@extends('layout.app')

    @section('content')

    <div class="clearfix"></div>

        <section id="contenido">

            <article class="articulo">
                <h3>Somos una empresa de ventas de componentes para Pc</h3>
                <p>Bienvenidos a tu tienda online para componenetes para tu Pc.
                Creada con la finalidad de que no tengas que buscar por todos lados tus componentes deseados al mejor precio.</p>
            </article>

            <article class="articulo">
                <h3>Metodos de pago</h3>
                <p>1. Efectivo.
                <p>2. Tarjetas de credito / debito.
                </p>3. Traferencias bancarias.<p>

            </article>

    </section>
        <aside>
            <h3>Articulos Nuevos</h3>
            <h4> Tarjeta de video 3080ti</h4>
                <img src="{{URL::asset('img/3080ti.jpg')}}" width="100">
            <p><a href="{{ route('producto.index') }}">Ver catalogo</a></p>
            <h4> Tarjeta de video 3060ti</h4>
                <img src="{{URL::asset('img/3060ti.jpg')}}" width="100">
            <p><a href="{{ route('producto.index') }}">Ver catalogo</a></p>
        </aside>
    @endsection
