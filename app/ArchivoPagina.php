<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoPagina extends Model
{
    protected $fillable = ['id_pagina','nombre','file', 'fecha'];

    public function pagina()
    {
        return $this->belongsTo('App\Pagina');
    }
}
