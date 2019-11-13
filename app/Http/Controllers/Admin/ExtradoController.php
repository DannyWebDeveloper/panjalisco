<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Auth;
use App\Extrado;

class ExtradoController extends Controller
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
        $extrados = Extrado::orderBy('id', 'DESC')->paginate();

        $categorias = DB::table('categorias_extrados')->get();


        return view('admin.extrados.index', compact(['extrados', 'categorias']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias =  DB::table('categorias_extrados')->pluck('nombre', 'id');
        return view('admin.extrados.create', compact('categorias'));
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
        $extrado = Extrado::create($request->all());

         //archivo
         if($request->file('documento')){
            $file= $request->file('documento');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-extrados/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-extrados', $request->file('documento'));
            }else{
                Storage::disk('public')->put('archivos-extrados/'.$nombre, file_get_contents($file));
                $path = 'archivos-extrados/'.$nombre;
            }
            $extrado->fill(['documento' => $path])->save();
        }


        return redirect()->route('adminextrados.index')
        ->with('info', 'Extrado creado con éxito');

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
        $extrado = Extrado::find($id);
        $categorias =  DB::table('categorias_extrados')->pluck('nombre', 'id');

        return view('admin.extrados.edit', compact(['extrado', 'categorias']));
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
        $extrado = Extrado::find($id);
        //$this->authorize('pass', $pagina);
        $extrado->fill($request->all())->save();

        if($request->file('documento')){
            $file= $request->file('documento');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-extrados/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-extrados', $request->file('documento'));
            }else{
                Storage::disk('public')->put('archivos-extrados/'.$nombre, file_get_contents($file));
                $path = 'archivos-extrados/'.$nombre;
            }
            $extrado->fill(['documento' => $path])->save();
        }

        return redirect()->route('adminextrados.edit', $extrado->id)
            ->with('info', 'Extraado actualizado con éxito');
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
        $extrado = Extrado::find($id);
        $extrado->delete();
        return back()->with('info', 'Extrado eliminado correctamente');
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*categorias de extrados */
    public function indexCategoria(){

        $categorias =  DB::table('categorias_extrados')->pluck('nombre', 'id');
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.extrados.index', compact(['extrados', 'categorias']));
    }
}
