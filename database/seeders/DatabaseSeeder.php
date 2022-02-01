<?php

namespace Database\Seeders;

use App\Models\Catalogo;
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

        $catalogo = new Catalogo();
        $catalogo -> nombre = 'Tarjeta de video';

        $catalogo->save();
    }
}
