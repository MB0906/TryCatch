<?php

namespace Database\Seeders;

use App\Models\Catalogo;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user -> nombre = 'Admin';
        $user -> email = 'Admin@trycatch.com';
        $user -> password = 'admin';
        $user -> rol = 'admin';

        $user->save();

        $user = new User();
        $user -> nombre = 'Juan Pedro';
        $user -> email = 'juanPedro@gmail.com';
        $user -> password = 'juan';
        $user -> rol = '';

        $user->save();

        $catalogo = new Catalogo();
        $catalogo -> nombre = 'Tarjeta de video';

        $catalogo->save();

        $catalogo = new Catalogo();
        $catalogo -> nombre = 'Procesadores';

        $catalogo->save();

        $producto = new Productos();
        $producto -> Nombre = 'Nvidia 1660 Super';
        $producto -> Descripcion = 'Juega a una estabilidad de 80 fps con tus resoluciones en el full HD 1080p.';
        $producto -> Precio = '670000';
        $producto -> Imagen = 'uploads/Tj4FD86jtKNcqAhP4OBdzIoGupPQrt6sCyZbMDUn.jpg';
        $producto -> catalogo_id = '1';

        $producto->save();

        $producto = new Productos();
        $producto -> Nombre = 'Nvidia 3060ti RTX';
        $producto -> Descripcion = 'Juega a una estabilidad de 144 fps con tus resoluciones en full 4K.';
        $producto -> Precio = '810000';
        $producto -> Imagen = 'uploads/rnpWHbwgSvatJwRLfSbOjwini25DTuBX9mEjoi1r.jpg';
        $producto -> catalogo_id = '1';

        $producto->save();

        $producto = new Productos();
        $producto -> Nombre = 'Nvidia 3080ti RTX';
        $producto -> Descripcion = 'Juega a una estabilidad de fps en cualquiera de las resoluciones de hoy en dia.';
        $producto -> Precio = '2199990';
        $producto -> Imagen = 'uploads/P3yUq8aDPGd47UbKnX7hlPmeDat2KZZSPKMToI4q.jpg';
        $producto -> catalogo_id = '1';

        $producto->save();

        $producto = new Productos();
        $producto -> Nombre = 'Ryzen 5 5600x';
        $producto -> Descripcion = 'Un procesador que puede con todo trabajo que le ordenes.';
        $producto -> Precio = '344000';
        $producto -> Imagen = 'uploads/FkRX4FOkexjAgsRRSCfnENtE5ai0n3SmGIIwvTw8.jpg';
        $producto -> catalogo_id = '2';

        $producto->save();

        $producto = new Productos();
        $producto -> Nombre = 'Ryzen 7 5800x';
        $producto -> Descripcion = 'Un procesador en el cual puedes hacer streams y jugar a cualquier video juego que quieras.';
        $producto -> Precio = '405990';
        $producto -> Imagen = 'uploads/GaJF1dzfBJy373RaoFgzz7xWOoin5lDNdYIvkcND.jpg';
        $producto -> catalogo_id = '2';

        $producto->save();

        $producto = new Productos();
        $producto -> Nombre = 'Ryzen 9 5900x';
        $producto -> Descripcion = 'Un procesador superior en el cual puedas hacer todo lo que te imagines';
        $producto -> Precio = '500000';
        $producto -> Imagen = 'uploads/lawLhLNR0xHIEiwxdWzuj5bB3V0FlTvfa60pfxhq.jpg';
        $producto -> catalogo_id = '2';

        $producto->save();




    }
}
