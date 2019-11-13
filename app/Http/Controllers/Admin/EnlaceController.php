<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enlace;

class EnlaceController extends Controller
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
        $enlaces = Enlace::orderBy('id', 'DESC')->paginate();
        return view('admin.enlaces.index', compact(['enlaces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.enlaces.create');
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
        $enlace = Enlace::create($request->all());

         //archivo
         if($request->file('img')){
            $file= $request->file('img');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img-enlaces/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img-enlaces', $request->file('img'));
            }else{
                Storage::disk('public')->put('img-enlaces/'.$nombre, file_get_contents($file));
                $path = 'img-enlaces/'.$nombre;
            }
            $enlace->fill(['img' => $path])->save();
        }


        return redirect()->route('adminenlaces.index')
        ->with('info', 'Enlace creado con éxito');
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
        $enlace = Enlace::find($id);

        return view('admin.enlaces.edit', compact(['enlace']));
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
        $enlace = Enlace::find($id);
        //$this->authorize('pass', $pagina);
        $enlace->fill($request->all())->save();

        if($request->file('img')){
            $file= $request->file('img');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img-enlaces/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img-enlaces', $request->file('img'));
            }else{
                Storage::disk('public')->put('img-enlaces/'.$nombre, file_get_contents($file));
                $path = 'img-enlaces/'.$nombre;
            }
            $enlace->fill(['img' => $path])->save();
        }

        return redirect()->route('adminenlaces.edit', $enlace->id)
            ->with('info', 'Enlace actualizado con éxito');
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
        $enlace = Enlace::find($id);
        $enlace->delete();
        return back()->with('info', 'Enlace eliminado correctamente');
    }
}
