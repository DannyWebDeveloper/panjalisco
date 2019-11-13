<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Auth;
use App\Comisione;
Use App\Comite;



class ComisionController extends Controller
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
        $comisiones = Comisione::orderBy('id', 'DESC')->get();
        $comites = Comite::get();

        return view('admin.comision.index', compact(['comisiones', 'comites']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comites = Comite::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('admin.comision.create', compact('comites'));
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
        $comision = Comisione::create($request->all());

        return redirect()->route('admincomision.index')->with('info', 'Se ha agregado nuevo miembro de comisión correctamente');
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
        $comites = Comite::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $comision = Comisione::find($id);
        return view('admin.comision.edit', compact(['comision', 'comites']));
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

        $comision = Comisione::find($id);
        //$this->authorize('pass', $pagina);
        $comision->fill($request->all())->save();
        return redirect()->route('admincomision.index')->with('info', 'Se ha actualizado miembro de comisión correctamente');
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
        $comision = Comisione::find($id);
        $comision->delete();

        return back()->with('info', 'Se ha eliminado correctamente');
    }
}
