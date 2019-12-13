<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Slider;
use App\Noticia;
use App\Categoria;
use App\Menu;
use App\Imagen_mapa;


class InicioController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::where('estado', 'PUBLICADO')->get();


        $menuss = Menu::where('estado', 'PUBLICADO')->get();

        $submenus = Menu::join('menus_subs', 'menus_subs.id_hijo', '=', 'menus.id')
        ->select('menus.id', 'menus.nombre', 'menus_subs.id_padre')
        ->where('menus.estado', 'PUBLICADO')->where('menus.nivel', 'Hijo')->orderby('menus.orden')->get();
        //$submenus = DB::table('menus_subs')->where

        $slugs = Menu::
        join('paginas', 'paginas.id', '=', 'menus.id_pagina')
        ->select('menus.id', 'paginas.titulo', 'paginas.slug' )
        ->get();


        $noticias = Noticia::
        join('categorias', 'noticias.id_categoria', '=', 'categorias.id')
        ->select('categorias.nombre', 'categorias.slug as slug_categoria', 'noticias.titulo', 'noticias.body', 'noticias.img', 'noticias.slug as slug_noticia', 'noticias.created_at', 'noticias.extracto' )
        ->where('noticias.estado', 'PUBLICADO')
        ->take(6)
        ->get();


        $mapas = Imagen_mapa::where('visible', 1)->get();


        return view('web.inicio', compact(['menus', 'submenus', 'slugs', 'sliders', 'noticias', 'mapas']));

    }
}
