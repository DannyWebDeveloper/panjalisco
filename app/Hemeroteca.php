<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hemeroteca extends Model
{
    //
    protected $fillable = ['nombreArchivo', 'archivo', 'fecha', 'visible'];
}
