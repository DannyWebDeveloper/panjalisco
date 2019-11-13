<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Imagen_mapa;

class ImagenMapaController extends Controller
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
        $mapas = Imagen_mapa::get();
        return view('admin.mapas.index', compact(['mapas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.mapas.create');
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
        $mapa = Imagen_mapa::create($request->all());


         //archivo img
         if($request->file('img')){

            $file= $request->file('img');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img-mapas/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img-mapas', $request->file('img'));
            }else{
                Storage::disk('public')->put('img-mapas/'.$nombre, file_get_contents($file));
                $path = 'img-mapas/'.$nombre;
            }
            $mapa->fill(['img' => $path])->save();
        }

        return redirect()->route('adminmapas.index')
        ->with('info', 'Imagen agregada con éxito');
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
        $mapa = Imagen_mapa::find($id);
        return view('admin.mapas.edit', compact('mapa'));
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
        $mapa = Imagen_mapa::find($id);
        $mapa->fill($request->all())->save();
        //archivo img
        if($request->file('img')){

            $file= $request->file('img');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img-mapas/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img-mapas', $request->file('img'));
            }else{
                Storage::disk('public')->put('img-mapas/'.$nombre, file_get_contents($file));
                $path = 'img-mapas/'.$nombre;
            }
            $mapa->fill(['img' => $path])->save();
        }
        return redirect()->route('adminmapas.index')
        ->with('info', 'Imagen agregada con éxito');

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
        $mapa = Imagen_mapa::find($id);
        $mapa->delete();
        return back()->with('info', 'Imagen de mapa eliminada correctamente');
    }
}
