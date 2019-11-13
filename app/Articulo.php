<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable = ['id', 'Numero', 'Titulo', 'Texto', 'Visible', 'Orden', 'img'];
}
