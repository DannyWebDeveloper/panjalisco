<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $fillable = ['name', 'email', 'msg', 'telelfono'];
}
