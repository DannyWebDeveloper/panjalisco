<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Menu;
use App\Pagina;
use Auth;
use DB;

class MenuController extends Controller
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
        $menus = Menu::orderBy('id', 'DESC')->paginate();

        $slugs = Menu::
        join('paginas', 'paginas.id', '=', 'menus.id_pagina')
        ->select('menus.id', 'paginas.titulo', 'paginas.slug' )
        ->get();


        return view('admin.menus.index', compact(['menus', 'slugs']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //select ppaginas
        $paginas = Pagina::where('estado', 'PUBLICADO')->orderBy('titulo', 'ASC')->pluck('titulo', 'id');
        //
        $menus_padre = Menu::where('nivel', 'Padre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('admin.menus.create', compact(['paginas', 'menus_padre']));


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
        $menu = Menu::create($request->all());
        if($request->get('nivel') == 'Hijo'){
            $cat = Menu::where('id', $request->get('id_padre'))
            ->update(['cantidad_subs'=> DB::raw('cantidad_subs+1')]);
        }


        return redirect()->route('adminmenus.index')
            ->with('info', 'Menú creado con éxito');
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
        $menu = Menu::find($id);
         //$this->authorize('pass', $menu);
        $slug_menu = Menu::
        join('paginas', 'paginas.id', '=', 'menus.id_pagina')
        ->select('paginas.slug')
        ->where('menus.id', $id)
        ->get();

        $submenus = Menu::where('id_padre', $id)->orderby('orden')->get();
        $slug_submenu = Menu::
        join('paginas', 'paginas.id', '=', 'menus.id_pagina')
        ->select('paginas.slug')
        ->where('menus.id_padre', $id)
        ->get();
        /*
         $archivos = ArchivoPagina::
         join('menus', 'menus.id', '=', 'archivo_menus.id_menu')
         ->select('archivo_menus.file', 'archivo_menus.nombre', 'archivo_menus.fecha')
         ->where('menus.id', $id)
         ->get();
        */
        //dd($submenus);

         return view('admin.menus.show', compact(['menu', 'slug_menu', 'submenus', 'slug_submenu']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        //
        //select ppaginas
        $paginas = Pagina::where('estado', 'PUBLICADO')->orderBy('titulo', 'ASC')->pluck('titulo', 'id');
        //
        $menus_padre = Menu::where('nivel', 'Padre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('admin.menus.edit', compact(['menu', 'paginas', 'menus_padre']));
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
        $menu = Menu::find($id);
        //$this->authorize('pass', $pagina);


        //si es menu hijo, suma la cantidad de subs al padres
        if($request->get('nivel') == 'Hijo'){
            //consultar si ya era hijo del padre seleccionado
            $isHijoExistente = Menu::where('id', $id)->where('id_padre', $request->get('id_padre'))->get();
            if(count($isHijoExistente) != 1){
                //si no existia como sub del padre seleccionado, le suma subs al padre
                $cat = Menu::where('id', $request->get('id_padre'))
                ->update(['cantidad_subs'=> DB::raw('cantidad_subs+1')]);
            }

            //es hijo y el padre es otro, verificar si ya tenia padre y desconotarle
            if($menu->id_padre > 0){

                $desc = Menu::where('id', $menu->id_padre)
                ->update(['cantidad_subs'=> DB::raw('cantidad_subs-1')]);

            }
        }

        $menu->fill($request->all())->save();

        return redirect()->route('adminmenus.edit', $menu->id)
            ->with('info', 'Menú actualizado con éxito');
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
        $menu = Menu::find($id);;
        //$this->authorize('pass', $pagina);
        //es hijo y el padre es otro, verificar si ya tenia padre y desconotarle
        if($menu->id_padre > 0){
            $desc = Menu::where('id', $menu->id_padre)
            ->update(['cantidad_subs'=> DB::raw('cantidad_subs-1')]);
        }

        $menu->delete();
        return back()->with('info', 'Menú eliminado correctamente');
    }

    //methodo for reorder menu
    public function reorder(Request $request){

        $arr = array($request->input());

        $new =$arr[0];

        unset($new['_token'], $new['rows']);

        $ids = array_keys($new);

        foreach($ids as $id){

            //echo $id;
            $menu = Menu::find($id);
            //$this->authorize('pass', $pagina);
            $menu->orden = $new[$id];
            $menu->save();
            //$menu->fill(['orden', $new[$id]])->save();
            //echo $id ."  ==" .$new[$id] ;

        }
        return back()->with('info', 'Orden actualizado correctamente');


        //dd($request->input('2'));

    }
}
