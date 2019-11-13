<?php

namespace App\Http\Controllers\Web\Paginas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pagina;

class PaginaController extends Controller
{
    //
    public function page($slug){
        $pagina = Pagina::where('slug', $slug)->first();

        //$noticias = Noticia::orderBY('id', 'DESC')->where('estado', 'PUBLICADO')->take(4)->get();
        /*
        $categoria = Categoria::
        join('noticias', 'noticias.id_categoria', '=', 'categorias.id')
        ->select('categorias.nombre', 'categorias.slug' )
        ->where('noticias.slug', $slug)
        ->get();
        */

        return view('web.pages.page', compact(['pagina' ]));

    }
}
