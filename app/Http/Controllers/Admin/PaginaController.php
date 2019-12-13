<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PaginaStoreRequest;
use App\Http\Requests\PaginaUpdateRequest;


use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

use App\Pagina;
use App\ArchivoPagina;
use Auth;


class PaginaController extends Controller
{
    public function __construct(){

        //para que sea necesario inciar session para porder usar este controller
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paginas = Pagina::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->paginate();
        return view('admin.paginas.index', compact('paginas'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.paginas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaginaStoreRequest $request)
    {
        $pagina = Pagina::create($request->all());

        //archivo imagen portada
         if($request->file('img')){
            $archivo = $request->file('img');

            $nombre = $archivo->getClientOriginalName();
            $filexiste = 'img-paginas/'.$nombre;

                if (Storage::disk('public')->exists($filexiste)) {
                    //si existe el nombre, agrega uno aleatorio
                    $path = Storage::disk('public')->put('img-paginas/', $archivo);
                }else{
                    Storage::disk('public')->put('img-paginas/'.$nombre, file_get_contents($archivo));
                    $path = 'img-paginas/'.$nombre;
                }

            $pagina->fill(['img' => $path])->save();
        }
        //archivos de pagina
        if($request->archivos){
            foreach ($request->archivos as $archivo) {

                $nombre = $archivo->getClientOriginalName();
                $filexiste = 'archivos-pagina-'.$pagina->id.'/'.$nombre;

                if (Storage::disk('public')->exists($filexiste)) {
                    //si existe el nombre, agrega uno aleatorio
                    $path = Storage::disk('public')->put('archivos-pagina-'.$pagina->id.'/', $archivo);
                }else{
                    Storage::disk('public')->put('archivos-pagina-'.$pagina->id.'/'.$nombre, file_get_contents($archivo));
                    $path = 'archivos-pagina-'.$pagina->id.'/'.$nombre;
                }


                ArchivoPagina::create([
                    'id_pagina' => $pagina->id,
                    'nombre' => $nombre,
                    'file' => $path
                ]);
            }
         }

        return redirect()->route('adminpaginas.index')
            ->with('info', 'Página creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //pagina
         $pagina = Pagina::find($id);
         //$this->authorize('pass', $pagina);


         $archivos = ArchivoPagina::
         join('paginas', 'paginas.id', '=', 'archivo_paginas.id_pagina')
         ->select('archivo_paginas.file', 'archivo_paginas.nombre', 'archivo_paginas.fecha')
         ->where('paginas.id', $id)
         ->get();


         return view('admin.paginas.show', compact(['pagina', 'archivos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagina = Pagina::find($id);
        //$this->authorize('pass', $pagina);

        //get documentos
        $archivos = ArchivoPagina::
         join('paginas', 'paginas.id', '=', 'archivo_paginas.id_pagina')
         ->select('archivo_paginas.id', 'archivo_paginas.file', 'archivo_paginas.nombre', 'archivo_paginas.fecha' )
         ->where('paginas.id', $id)
         ->get();


        return view('admin.paginas.edit', compact(['pagina', 'archivos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaginaUpdateRequest $request, $id)
    {
        $pagina = Pagina::find($id);
        //$this->authorize('pass', $pagina);

        $pagina->fill($request->all())->save();

         //archivo imagen
         if($request->file('img')){
            $archivo = $request->file('img');

            $nombre = $archivo->getClientOriginalName();
            $filexiste = 'img-paginas/'.$nombre;

                if (Storage::disk('public')->exists($filexiste)) {
                    //si existe el nombre, agrega uno aleatorio
                    $path = Storage::disk('public')->put('img-paginas/', $archivo);
                }else{
                    Storage::disk('public')->put('img-paginas/'.$nombre, file_get_contents($archivo));
                    $path = 'img-paginas/'.$nombre;
                }

            $pagina->fill(['img' => $path])->save();
         }

        //archivos de pagina
        if($request->archivos){
            foreach ($request->archivos as $archivo) {

                $nombre = $archivo->getClientOriginalName();
                $filexiste = 'archivos-pagina-'.$pagina->id.'/'.$nombre;

                if (Storage::disk('public')->exists($filexiste)) {
                    //si existe el nombre, agrega uno aleatorio
                    $path = Storage::disk('public')->put('archivos-pagina-'.$pagina->id.'/', $archivo);
                }else{
                    Storage::disk('public')->put('archivos-pagina-'.$pagina->id.'/'.$nombre, file_get_contents($archivo));
                    $path = 'archivos-pagina-'.$pagina->id.'/'.$nombre;
                }


                ArchivoPagina::create([
                    'id_pagina' => $pagina->id,
                    'nombre' => $nombre,
                    'file' => $path
                ]);
            }
         }

        return redirect()->route('adminpaginas.edit', $pagina->id)
            ->with('info', 'Página actualizada con éxito');
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
        $pagina = Pagina::find($id);;
        //$this->authorize('pass', $pagina);

        $pagina->delete();
        return back()->with('info', 'Página eliminada correctamente');
    }

    public function deleteArchivo($id){

        $archivo = ArchivoPagina::find($id);;

        $pagina = Pagina::find($id);

        //$this->authorize('pass', $pagina);

        $archivo->delete();
        return back()->with('info', 'Archivo eliminado correctamente');
    }

    public function actualizaArchivo($id, Request $request){

        ArchivoPagina::where('id', $id)->update(['nombre' => $request->nombre, 'fecha' => $request->fecha]);
        //dd($request->nombre);


        return back()->with('info', 'Archivo actualizado correctamente');
    }
}
