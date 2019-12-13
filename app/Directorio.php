<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    //
    protected $fillable = ['nombre', 'p_apellido', 's_apellido', 'telefono', 'ext', 'email', 'area', 'cargo',  'titular', 'visible'];


}

