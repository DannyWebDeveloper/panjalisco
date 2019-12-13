<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Auth;
use App\Estrado;

class EstradoController extends Controller
{
    public function __construct(){

        //para que sea necesario inciar session para porder usar este controller
        $this->middleware('auth');
    }

    public function index()
    {

        $categorias = DB::table('extrados_categorias')->get();
        $subcategorias = DB::table('extrados_subcategorias')->get();
        $grupos = DB::table('extrados_grupos')->get();
        $docs = DB::table('extrados_documentos')->get();


        return view('admin.estrados.index', compact(['categorias', 'subcategorias', 'grupos', 'docs']));
    }

    public function create()
    {
        //
        $categorias =  DB::table('categorias_extrados')->pluck('nombre', 'id');
        return view('admin.estrados.create', compact('categorias'));
    }

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


        return redirect()->route('adminestrados.index')
        ->with('info', 'Estrado creado con éxito');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $extrado = Extrado::find($id);
        $categorias =  DB::table('categorias_extrados')->pluck('nombre', 'id');

        return view('admin.estrados.edit', compact(['extrado', 'categorias']));
    }

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

        return redirect()->route('adminestrados.edit', $extrado->id)
            ->with('info', 'Estrado actualizado con éxito');
    }


    public function destroy($id)
    {
        //
        $extrado = Extrado::find($id);
        $extrado->delete();
        return back()->with('info', 'Estrado eliminado correctamente');
    }


    /******* categorias de extrados   *******/
    public function indexCategorias(){
        $categorias =  DB::table('extrados_categorias')->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.categorias.index', compact(['categorias']));
    }

    public function createCategoria(){
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.categorias.create');
    }
    public function storeCategoria(Request $request){

        DB::table('extrados_categorias')->insert(
            ['nombre' => $request->nombre, 'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        //return view('admin.extrados.categorias', compact('categorias'));
        return back()->with('info', 'Categoria creada correctamente');
        //return view('admin.estrados.categorias.index', compact(['categorias']));
    }
    public function editCategoria($id){
        $categoria =  DB::table('extrados_categorias')->find($id);
        $docs = DB::table('extrados_documentos')->where('id_categoria', $id)->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.categorias.edit', compact(['categoria', 'docs']));
    }
    public function updateCategoria(Request $request){
        DB::table('extrados_categorias')
        ->where('id', $request->id)
        ->update(
            ['nombre' => $request->nombre, 'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        return back()->with('info', 'Categoria actualizada correctamente');
    }
    public function deleteCategoria(Request $request, $id){

        $cat = DB::table('extrados_categorias')->where('id', $id)->delete();
        return back()->with('info', 'Categoria eliminada correctamente');
    }



    /************* subcategorias extrados ***********/
    public function indexSubCategorias(){
        $categorias =  DB::table('extrados_categorias')->get();
        $subcategorias =  DB::table('extrados_subcategorias')->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.subcategorias.index', compact(['categorias', 'subcategorias']));
    }

    public function createSubCategoria(){
        //return view('admin.extrados.categorias', compact('categorias'));
        $categorias =  DB::table('extrados_categorias')->pluck('nombre', 'id');

        return view('admin.estrados.subcategorias.create', compact(['categorias']));
    }
    public function storeSubCategoria(Request $request){

        DB::table('extrados_subcategorias')->insert(
            ['id_categoria' => $request->id_categoria, 'nombre' => $request->nombre, 'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        //return view('admin.extrados.categorias', compact('categorias'));
        return back()->with('info', 'Categoria creada correctamente');
        //return view('admin.estrados.categorias.index', compact(['categorias']));
    }
    public function editSubCategoria($id){
        $categorias =  DB::table('extrados_categorias')->pluck('nombre', 'id');
        $subcategoria =  DB::table('extrados_subcategorias')->find($id);
        $docs = DB::table('extrados_documentos')->where('id_subcategoria', $id)->get();

        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.subcategorias.edit', compact(['subcategoria', 'categorias', 'docs']));
    }
    public function updateSubCategoria(Request $request){
        DB::table('extrados_subcategorias')
        ->where('id', $request->id)
        ->update(
            ['id_categoria'=>$request->id_categoria, 'nombre' => $request->nombre, 'texto'=>$request->texto,  'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        return back()->with('info', 'Sub-Categoria actualizada correctamente');
    }
    public function deleteSubCategoria(Request $request, $id){

        $cat = DB::table('extrados_subcategorias')->where('id', $id)->delete();
        return back()->with('info', 'Sub-Categoria eliminada correctamente');
    }



    /************* grupo  extrados ***********/
     public function indexGrupos(){
        $categorias =  DB::table('extrados_categorias')->get();
        $subcategorias =  DB::table('extrados_subcategorias')->get();
        $grupos =  DB::table('extrados_grupos')->get();

        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.grupos.index', compact(['categorias', 'subcategorias', 'grupos']));

    }

    public function createGrupo(){
        //return view('admin.extrados.categorias', compact('categorias'));
        $subcategorias =  DB::table('extrados_subcategorias')->pluck('nombre', 'id');

        return view('admin.estrados.grupos.create', compact(['subcategorias']));
    }
    public function storeGrupo(Request $request){

        DB::table('extrados_grupos')->insert(
            ['id_subcategoria' => $request->id_subcategoria, 'nombre' => $request->nombre, 'texto' => $request->texto,  'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        //$grupos =  DB::table('extrados_grupos')->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return back()->with('info', 'Categoria creada correctamente');
        //return view('admin.estrados.grupos.index', compact($grupos))->with('info', 'Categoria creada correctamente');
    }
    public function editGrupo($id){
        $subcategorias =  DB::table('extrados_subcategorias')->pluck('nombre', 'id');
        $grupo =  DB::table('extrados_grupos')->find($id);
        $docs = DB::table('extrados_documentos')->where('id_grupo', $id)->get();

        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.grupos.edit', compact(['grupo', 'subcategorias', 'docs']));
    }
    public function updateGrupo(Request $request){
        DB::table('extrados_grupos')
        ->where('id', $request->id)
        ->update(
            ['id_subcategoria'=>$request->id_subcategoria, 'nombre' => $request->nombre, 'texto'=>$request->texto,  'fecha' => $request->fecha, 'visible' => $request->visible]
        );
        return back()->with('info', 'Grupo actualizado correctamente');
    }
    public function deleteGrupo(Request $request, $id){

        $cat = DB::table('extrados_grupos')->where('id', $id)->delete();
        return back()->with('info', 'Grupo eliminado correctamente');
    }


    /*************** documentos de extrado ***********/
    public function indexDocs(){

        $grupos =  DB::table('extrados_grupos')->get();
        $docs = DB::table('extrados_documentos')->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.documentos.index', compact(['docs', 'grupos']));

    }

    public function createDoc($nivel, $id){


        //return view('admin.extrados.categorias', compact('categorias'));
        $categorias =  DB::table('extrados_categorias')->pluck('nombre', 'id');
        $subcategorias =  DB::table('extrados_subcategorias')->pluck('nombre', 'id');
        $grupos =  DB::table('extrados_grupos')->pluck('nombre', 'id');

        return view('admin.estrados.documentos.create', compact(['nivel', 'id', 'categorias', 'subcategorias', 'grupos']));
    }
    public function storeDoc(Request $request){

        if($request->nivel == 1){
            $doc =  DB::table('extrados_documentos')->insert(
                ['id_categoria'=>$request->id_categoria, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }
        if($request->nivel == 2){
            $doc = DB::table('extrados_documentos')->insert(
                ['id_subcategoria'=>$request->id_subcategoria, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }
        if($request->nivel == 3){
            $doc = DB::table('extrados_documentos')->insert(
                ['id_grupo'=>$request->id_grupo, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }

        if($doc){
            $id = DB::table('extrados_documentos')->orderby('id','DESC')->take(1)->get();
        }

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
            DB::table('extrados_documentos')->where('id', $id[0]->id)->update(['documento' => $path]);
        }


        //$grupos =  DB::table('extrados_grupos')->get();
        //return view('admin.extrados.categorias', compact('categorias'));
        return back()->with('info', 'Documento agregado correctamente');
        //return view('admin.estrados.grupos.index', compact($grupos))->with('info', 'Categoria creada correctamente');
    }
    public function editDoc($id){
        $categorias =  DB::table('extrados_categorias')->pluck('nombre', 'id');
        $subcategorias =  DB::table('extrados_subcategorias')->pluck('nombre', 'id');
        $grupos =  DB::table('extrados_grupos')->pluck('nombre', 'id');

        $doc =  DB::table('extrados_documentos')->find($id);
        //$docs = DB::table('extrados_documentos')->where('id_grupo', $id)->get();

        $nivel = null;
        //return view('admin.extrados.categorias', compact('categorias'));
        return view('admin.estrados.documentos.edit', compact(['nivel', 'doc', 'categorias',  'subcategorias', 'grupos']));
    }
    public function updateDoc(Request $request){

        if($request->nivel == 1){
            $doc = DB::table('extrados_documentos')->where('id', $request->id)
            ->update(
                ['id_categoria'=>$request->id_categoria, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }
        if($request->nivel == 2){
            $doc = DB::table('extrados_documentos')->where('id', $request->id)
            ->update(
                ['id_subcategoria'=>$request->id_subcategoria, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }
        if($request->nivel == 3){
            $doc = DB::table('extrados_documentos')->where('id', $request->id)
            ->update(
                ['id_grupo'=>$request->id_grupo, 'nivel' => $request->nivel, 'nombre' => $request->nombre, 'fechaDocumento' => $request->fechaDocumento, 'fechaUpdate' => $request->fechaUpdate,  'visible' => $request->visible]
            );
        }

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
            DB::table('extrados_documentos')->where('id', $request->id)->update(['documento' => $path]);
        }

        return back()->with('info', 'Grupo actualizado correctamente');
    }
    public function deleteDoc(Request $request, $id){

        $cat = DB::table('extrados_documentos')->where('id', $id)->delete();
        return back()->with('info', 'Documento eliminado correctamente');
    }




}
