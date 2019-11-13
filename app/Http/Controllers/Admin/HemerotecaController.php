<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Hemeroteca;
use App\Auth;
class HemerotecaController extends Controller
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
        $hemes = Hemeroteca::orderBy('id', 'DESC')->paginate();
        return view('admin.hemeroteca.index', compact(['hemes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hemeroteca.create');
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
        $heme = Hemeroteca::create($request->all());

        //archivo
        if($request->file('archivo')){
           $file= $request->file('archivo');
           $nombre = $file->getClientOriginalName();
           $filexiste = 'archivos-hemeroteca/'.$nombre;
           if (Storage::disk('public')->exists($filexiste)) {
               //si existe el nombre, agrega uno aleatorio
               $path = Storage::disk('public')->put('archivos-hemeroteca', $request->file('archivo'));
           }else{
               Storage::disk('public')->put('archivos-hemeroteca/'.$nombre, file_get_contents($file));
               $path = 'archivos-hemeroteca/'.$nombre;
           }
           $heme->fill(['archivo' => $path])->save();
       }


       return redirect()->route('adminhemeroteca.index')
       ->with('info', 'Archivo agregado con éxito');
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
        $heme = Hemeroteca::find($id);
        return view('admin.hemeroteca.edit', compact('heme'));
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
        $heme = Hemeroteca::find($id);
        $heme->fill($request->all())->save();

        if($request->file('archivo')){
            $file= $request->file('archivo');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-hemerotecas/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-hemerotecas', $request->file('archivo'));
            }else{
                Storage::disk('public')->put('archivos-hemerotecas/'.$nombre, file_get_contents($file));
                $path = 'archivos-hemerotecas/'.$nombre;
            }
            $heme->fill(['archivo' => $path])->save();
        }

        return redirect()->route('adminhemeroteca.edit', $heme->id)
            ->with('info', 'Archivo actualizado con éxito');
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
        $heme = Hemeroteca::find($id);
        $heme->delete();

        return back()->with('info', 'Archivo eliminado con éxito');

    }
}
