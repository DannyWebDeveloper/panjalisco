<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloParrafo extends Model
{
    //
    protected $fillable = ['Id_Articulo', 'Numero_Parrafo', 'Titulo', 'Texto', 'Visible', 'Orden', 'Fecha', 'FechaAuto'];
}
