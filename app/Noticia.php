<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $fillable = ['titulo', 'extracto', 'body', 'img', 'slug', 'estado', 'id_categoria', 'id_user'];


    //relacion notica - cateogria

}
