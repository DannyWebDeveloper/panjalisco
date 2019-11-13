<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    //
    protected $fillable = ['titulo', 'slug', 'img', 'body', 'estado', 'has_file', 'id_user'];
}

