<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    //
    protected $fillable = ['titulo', 'documento', 'visible', 'fecha'];
}
