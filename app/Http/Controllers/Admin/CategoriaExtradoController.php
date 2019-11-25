<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CategoriaExtradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $categorias = DB::table('categorias_extrados')->get();

       $extrados = DB::table('extrados')
        ->selectRaw('extrados.id_categoria, count(*) as cantidad')
        ->join('categorias_extrados', 'extrados.id_categoria', '=', 'categorias_extrados.id')
        ->groupBy('extrados.id_categoria')
        ->get();

       return view('admin.estrados.categoria', compact(['extrados', 'categorias']));
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
        $categoria = DB::table('categorias_extrados')->insert(['nombre' => $request->get('nombre')]);
        return back()->with('info', 'Categoria creada correctamente');

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
        $categoria = DB::table('categorias_extrados')->where('id', $id)->get();
        return back()->with('edit', $categoria);
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

        $cat = DB::table('categorias_extrados')->where('id', $id)->update(['nombre' => $request->get('nombre')]);
        //$this->authorize('pass', $pagina);

        return back()->with('info', 'Categoria actualizada correctamente');
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
        $categoria = DB::table('categorias_extrados')->where('id', $id)->delete();
        //$categoria->delete();
        return back()->with('info', 'Categoria eliminada correctamente');
    }
}
