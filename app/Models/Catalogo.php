<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Catalogo extends Model
{
    use HasFactory;

    public function productos(){
        return $this->hasMany(Productos::class);
    }
}
