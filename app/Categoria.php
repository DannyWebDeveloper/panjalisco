<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable = ['nombre', 'slug'];

    public function noticias(){
        return $this->hasMany(Noticia::class);
    }
}

