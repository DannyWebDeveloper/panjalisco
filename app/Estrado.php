<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrado extends Model
{
    //
    protected $fillable = ['titulo', 'documento', 'id_categoria', 'visible', 'fecha'];
}
