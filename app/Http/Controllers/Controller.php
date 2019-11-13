<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Menu;
use App\Social;
use App\What;
use App\Enlace;

use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $menus = Menu::where('estado', 'PUBLICADO')->get();
        $submenus = Menu::where('estado', 'PUBLICADO')->where('nivel', 'Hijo')->orderby('orden')->get();

        $slugs = Menu::
        join('paginas', 'paginas.id', '=', 'menus.id_pagina')
        ->select('menus.id', 'paginas.titulo', 'paginas.slug' )
        ->get();

        //get link socials
        $socials = Social::where('visible', 1)->get();
        $whats = What::where('visible', 1)->first();

        //enlaces
        $enlaces = Enlace::where('visible', 1)->get();

        // Sharing is caring
        View::share(compact(['menus', 'submenus', 'slugs', 'socials', 'whats', 'enlaces']));
    }
}
