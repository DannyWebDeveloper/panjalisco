<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelo
use App\ArticuloParrafo;

class ArticuloParrafoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $parrafos = ArticuloParrafo::where('Visible', 1)
        ->orderBy('Orden', 'asc')
        ->get();

    }
    public static function getParrafos($args)
    {

        //obtener los parrafos y los documentos que tenga
        $parrafos = ArticuloParrafo::where('Id_Articulo', $args)
        ->where('Visible', 1)
        ->get();


        $incisos = ArticuloInciso::get();


        //obtener los documentos que tenga el parrafo
        $doc_parrafos = ArticuloParrafo::
        join('articulo_documentos', 'articulo_documentos.id_parrafo', '=', 'articulo_parrafos.id')
        ->select('articulo_parrafos.id', 'articulo_documentos.NombreDocumento', 'articulo_documentos.id_parrafo', 'articulo_documentos.Archivo',  'articulo_documentos.Link',  'articulo_documentos.FechaDocumento' )
        ->where('articulo_parrafos.Id_Articulo', $args)
        ->where('articulo_parrafos.Visible', 1)
        ->where('articulo_documentos.visible', 1)
        ->orderBy('articulo_documentos.FechaDocumento', 'desc')
        ->get();

        return view('web.transparencia.parrafos', compact('parrafos', 'doc_parrafos', 'incisos'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
