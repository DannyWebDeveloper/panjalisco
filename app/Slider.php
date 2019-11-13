<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = ['nombre', 'img', 'descripcion', 'link', 'estado'];
}
