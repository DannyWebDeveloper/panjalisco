<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloInciso extends Model
{
    //
    protected $fillable = ['Id_parrafo', 'Numero_Letra_Inciso', 'Titulo', 'Texto', 'Visible', 'Orden',  'Fecha', 'FechaAuto'];
}
