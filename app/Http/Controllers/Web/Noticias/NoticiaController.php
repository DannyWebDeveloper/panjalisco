<?php

namespace App\Http\Controllers\Web\Noticias;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Noticia;
use App\Categoria;

class NoticiaController extends Controller
{
    //
    public function notas(){
        $noticias = Noticia::orderBY('id', 'DESC')->where('estado', 'PUBLICADO')->paginate(10);

        return view('web.noticias.todas', compact('noticias'));
    }

    public function nota($slug){
        $noticia = Noticia::where('slug', $slug)->first();

        $noticias = Noticia::orderBY('id', 'DESC')->where('estado', 'PUBLICADO')->take(4)->get();

        $categoria = Categoria::
        join('noticias', 'noticias.id_categoria', '=', 'categorias.id')
        ->select('categorias.nombre', 'categorias.slug' )
        ->where('noticias.slug', $slug)
        ->get();


        return view('web.noticias.noticia', compact(['noticia', 'categoria', 'noticias']));

    }

    public function categoria($slug){

        $categoria = Categoria::where('slug', $slug)->pluck('id')->first();
        $noticias = Noticia::where('id_categoria', $categoria)
                    ->orderBy('id', 'desc')->where('estado', 'PUBLICADO')->paginate(10);

        return view('web.noticias.todas', compact('noticias'));
    }
}
