<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Auth;
use App\Comite;

class ComiteController extends Controller
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
        $comites = Comite::orderBy('id', 'DESC')->get();

        return view('admin.comite.index', compact('comites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.comite.create');
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
        $comite = Comite::create($request->all());
         //archivo
         if($request->file('foto')){
            $file= $request->file('foto');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-comites/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-comite', $request->file('foto'));
            }else{
                Storage::disk('public')->put('fotos-comite/'.$nombre, file_get_contents($file));
                $path = 'fotos-comite/'.$nombre;
            }
            $comite->fill(['foto' => $path])->save();
        }

        return redirect()->route('admincomite.index')
        ->with('info', 'Miembro de comité creado con éxito');
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
        $comite = Comite::find($id);

        return view('admin.comite.edit', compact('comite'));
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
        $comite = Comite::find($id);
        //$this->authorize('pass', $pagina);
        $comite->fill($request->all())->save();
        //archivo
        if($request->file('foto')){
            $file= $request->file('foto');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-comites/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-comite', $request->file('foto'));
            }else{
                Storage::disk('public')->put('fotos-comite/'.$nombre, file_get_contents($file));
                $path = 'fotos-comite/'.$nombre;
            }
            $comite->fill(['foto' => $path])->save();
        }

        return redirect()->route('admincomite.index')
        ->with('info', 'Miembro de comité actualizado con éxito');

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
        $comite = Comite::find($id);
        $comite->delete();

        return back()->with('info', 'Miembro del comité eliminado correctamente.');
    }
}
