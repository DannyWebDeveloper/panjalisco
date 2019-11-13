<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloDocumento extends Model
{
    //
    protected $fillable = ['Id_Inciso','id_parrafo', 'NombreDocumento', 'Archivo', 'Link', 'Tipo', 'FechaDocumento',  'visible'];
}
