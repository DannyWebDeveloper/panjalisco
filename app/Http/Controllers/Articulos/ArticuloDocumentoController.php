<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelo
use App\ArticuloDocumento;


class ArticuloDocumentoController extends Controller
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

    public static function getDocumentosParrafo($id_parrafo){
        $documentos_parrafo = ArticuloDocumento::where('id_parrafo', $id_parrafo)->where('visible', 1)->get();
        //$incisos = ArticuloInciso::all();
        return view('web.transparencia.documentos', compact('documentos_parrafo'));
        //return $incisos;
    }

    public static function getDocumentosInciso($id_inciso){
        $documentos_inciso = ArticuloDocumento::where('Id_Inciso', $id_inciso)->where('visible', 1)->get();
        //$incisos = ArticuloInciso::all();
        //return view('web.transparencia', compact('documentos_inciso'));
        //return back()->with('info', 'hola');
        //return $incisos;
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
     *
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
