<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['nombre', 'nivel', 'id_padre', 'id_pagina', 'link_externo', 'orden',  'estado', 'cantidad_subs', 'id_user'];

    protected $attributes = [
        'cantidad_subs' => 0,
    ];
}
