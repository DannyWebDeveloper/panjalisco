<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Auth;
use App\Boletin;

class BoletinController extends Controller
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
        $boletines = Boletin::orderBy('id', 'DESC')->paginate();
        return view('admin.boletines.index', compact('boletines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.boletines.create');
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
        $boletin = Boletin::create($request->all());
        /*
        $boletin->fill($request->all())->save();
        $path = Storage::disk('public')->put('archivos-boletines', $request->file('documento'));
        $boletin->fill(['documento' => asset($path)])->save();
        */
         //archivo
         if($request->file('documento')){
            $file= $request->file('documento');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-boletines/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-boletines', $request->file('documento'));
            }else{
                Storage::disk('public')->put('archivos-boletines/'.$nombre, file_get_contents($file));
                $path = 'archivos-boletines/'.$nombre;
            }
            $boletin->fill(['documento' => $path])->save();
        }


        return redirect()->route('adminboletines.index')
        ->with('info', 'Boleitn creado con éxito');
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
        $boletin = Boletin::find($id);
        return view('admin.boletines.edit', compact('boletin'));
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
        $boletin = Boletin::find($id);
        //$this->authorize('pass', $pagina);
        $boletin->fill($request->all())->save();



        if($request->file('documento')){
            $file= $request->file('documento');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'archivos-boletines/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('archivos-boletines', $request->file('documento'));
            }else{
                Storage::disk('public')->put('archivos-boletines/'.$nombre, file_get_contents($file));
                $path = 'archivos-boletines/'.$nombre;
            }
            $boletin->fill(['documento' => $path])->save();
        }

        return redirect()->route('adminboletines.edit', $boletin->id)
            ->with('info', 'Boletin actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boletin = Boletin::find($id);
        $boletin->delete();
        return back()->with('info', 'Boletin eliminado correctamente');
    }
}
