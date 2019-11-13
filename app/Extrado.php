<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extrado extends Model
{
    //
    protected $fillable = ['titulo', 'documento', 'id_categoria', 'visible', 'fecha'];
}
