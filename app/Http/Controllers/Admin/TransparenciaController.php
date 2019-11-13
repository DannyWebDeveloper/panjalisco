<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Articulo;
use App\ArticuloParrafo;
use App\ArticuloInciso;
use App\ArticuloDocumento;
use Auth;
class TransparenciaController extends Controller
{
    public function __construct(){

        //para que sea necesario inciar session para porder usar este controller
        $this->middleware('auth');
    }
    //
    public function index(){
        $articulos = Articulo::all();
        return view('admin.transparencia.index', compact(['articulos', 'parrafos']));
    }

    public function showParrafos($id){
        $parrafos = ArticuloParrafo::where('Id_Articulo', $id)->get();

        //return view('admin.transparencia.index', compact(['articulos', 'parrafos']));
        return back()->with(compact('parrafos'));
    }
    public function showIncisos($id){
        $incisos = ArticuloInciso::where('Id_Parrafo', $id)->get();

        //return view('admin.transparencia.index', compact(['articulos', 'parrafos']));
        return back()->with(compact('incisos'));
    }
    public function showDocumentos($id){
        $documentos = ArticuloDocumento::where('Id_Inciso', $id)->get();

        //return view('admin.transparencia.index', compact(['articulos', 'parrafos']));
        return back()->with(compact('documentos'));
    }


    /***** FORMULARIOS Agregaar EDITAR ARTICULOS*/
    public function indexArticulos(){
        $articulos = Articulo::all();
        return view('admin.transparencia.articulos.index', compact(['articulos']));
    }
    public function editArticulo($id){
        $articulo = Articulo::find($id);
        return view('admin.transparencia.articulo.form', compact('articulo'));
    }
    public function updateArticulo(Request $request, $id){
        $articulo = Articulo::find($id);
        //$this->authorize('pass', $pagina);
        $articulo->fill($request->all())->save();
        return back()->with('info', 'Articulo actualizado correctamente');
    }
    public function crearArticulo(){
        return view('admin.transparencia.articulos.create');
    }
    public function createArticulo(Request $request){
        $articulo = Articulo::create($request->all());
        //archivo imagen
        /*
        if($request->file('img')){
            $path = Storage::disk('public')->put('img-paginas', $request->file('img'));
            $pagina->fill(['img' => asset($path)])->save();

        }
        */
        return redirect()->route('articulos')
            ->with('info', 'Articulo creada con éxito');
    }

    /***** FORMULARIOS Agregaar EDITAR parrafos*/
    public function indexParrafos(){
        $parrafos = ArticuloParrafo::
        join('articulos', 'articulos.id', '=', 'articulo_parrafos.Id_Articulo')
        ->select('articulo_parrafos.id', 'articulo_parrafos.Numero_Parrafo', 'articulo_parrafos.Titulo', 'articulo_parrafos.Texto', 'articulo_parrafos.Visible', 'articulo_parrafos.Orden','articulos.Numero' )
        ->get();

        return view('admin.transparencia.parrafos.index', compact(['parrafos']));
    }
    public function editParrafo($id){
        $parrafo = ArticuloParrafo::find($id);
        $articulos = Articulo::where('Visible', 1)->pluck('Titulo', 'id');

        $documentos = ArticuloDocumento::where('Id_Parrafo', $id)->get();

        return view('admin.transparencia.parrafos.edit', compact(['parrafo', 'articulos', 'documentos']));
    }
    public function updateParrafo(Request $request, $id){
        $parrafo = ArticuloParrafo::find($id);
        //$this->authorize('pass', $pagina);
        $parrafo->fill($request->all())->save();
        return back()->with('info', 'Parrafo actualizado correctamente');
    }
    public function crearParrafo(){
        $articulos = Articulo::where('Visible', 1)->pluck('Titulo', 'id');
        return view('admin.transparencia.parrafos.create', compact('articulos'));
    }
    public function createParrafo(Request $request){
        $articulo = ArticuloParrafo::create($request->all());
        //archivo imagen
        /*
        if($request->file('img')){
            $path = Storage::disk('public')->put('img-paginas', $request->file('img'));
            $pagina->fill(['img' => asset($path)])->save();
        }
        */
        return redirect()->route('parrafos')
            ->with('info', 'Parrafo creada con éxito');
    }


    /***** FORMULARIOS Agregaar EDITAR INCISOS*/
    public function indexIncisos(){
        $incisos = ArticuloInciso::
        join('articulo_parrafos', 'articulo_parrafos.id', '=', 'articulo_incisos.Id_Parrafo' )
        ->join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
        ->select('articulo_incisos.*', 'articulo_parrafos.Numero_Parrafo', 'articulos.Numero')
        ->get();

        return view('admin.transparencia.incisos.index', compact(['incisos']));
    }
    public function editInciso($id){
        $inciso = ArticuloInciso::find($id);
        $parrafos = ArticuloParrafo::
            join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
            ->where('articulo_parrafos.Visible', 1)
            ->selectRaw('concat ("Articulo ",articulos.Numero,", Parrafo ", articulo_parrafos.Numero_Parrafo) as articulo, articulo_parrafos.id')
            ->pluck('articulo', 'id');

        $documentos = ArticuloDocumento::where('Id_Inciso', $id)->get();

        return view('admin.transparencia.incisos.edit', compact(['inciso', 'parrafos', 'documentos']));
    }
    public function updateInciso(Request $request, $id){
        $inciso = ArticuloInciso::find($id);
        //$this->authorize('pass', $pagina);
        $inciso->fill($request->all())->save();
        return back()->with('info', 'Inciso actualizado correctamente');
    }
    public function crearInciso(){
        $articulos = Articulo::where('Visible', 1)->pluck('Titulo', 'id');
        /*
        $parrafos = ArticuloParrafo::
        join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
        ->select('articulos.Numero', 'articulo_parrafos.Numero_Parrafo', 'articulo_parrafos.id')
        ->where('articulo_parrafos.Visible', 1)
        ->pluck('articulos.Numero', 'articulos_parrafos.Numero_Parrafo', 'articulo_parrafos.id');
        */
        $parrafos = ArticuloParrafo::
            join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
            ->where('articulo_parrafos.Visible', 1)
            ->selectRaw('concat ("Articulo ",articulos.Numero,", Parrafo ", articulo_parrafos.Numero_Parrafo) as articulo, articulo_parrafos.id')
            ->pluck('articulo', 'id');


        return view('admin.transparencia.incisos.create', compact(['articulos', 'parrafos']));
    }
    public function createInciso(Request $request){
        $articulo = ArticuloInciso::create($request->all());
        //archivo imagen
        /*
        if($request->file('img')){
            $path = Storage::disk('public')->put('img-paginas', $request->file('img'));
            $pagina->fill(['img' => asset($path)])->save();
        }
        */
        return redirect()->route('incisos')
            ->with('info', 'Inciso creada con éxito');
    }
    /***** DOCUMENTOS DE PARRAFOS E INCISOS*/
    public function indexDocumentos(){
        /*
        $incisos = ArticuloInciso::
        join('articulo_parrafos', 'articulo_parrafos.id', '=', 'articulo_incisos.Id_Parrafo' )
        ->join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
        ->select('articulo_incisos.*', 'articulo_parrafos.Numero_Parrafo', 'articulos.Numero')
        ->get();
        */
        $documentos = ArticuloDocumento::
        leftjoin('articulo_parrafos', 'articulo_parrafos.id', '=', 'articulo_documentos.id_parrafo')
        ->leftjoin('articulo_incisos', 'articulo_incisos.id', '=', 'articulo_documentos.Id_Inciso')
        ->select('articulo_documentos.*', 'articulo_parrafos.Numero_Parrafo', 'articulo_incisos.Numero_Letra_Inciso')
        ->paginate(10);

        return view('admin.transparencia.documentos.index', compact(['documentos']));
    }
    public function editDocumento($id){
        $documento = ArticuloDocumento::find($id);
        /*
        $parrafos = ArticuloParrafo::
            join('articulos', 'articulo_parrafos.Id_Articulo', '=', 'articulos.id')
            ->where('articulo_parrafos.Visible', 1)
            ->selectRaw('concat ("Articulo ",articulos.Numero,", Parrafo ", articulo_parrafos.Numero_Parrafo) as articulo, articulo_parrafos.id')
            ->pluck('articulo', 'id');

        $documentos = ArticuloDocumento::where('Id_Inciso', $id)->get();
        */
        return view('admin.transparencia.documentos.edit', compact(['documento']));
    }
    public function updateDocumento(Request $request, $id){
        $documento = ArticuloDocumento::find($id);
        //$this->authorize('pass', $pagina);
        $documento->fill($request->all())->save();
        return back()->with('info', 'Documento actualizado correctamente');
    }
    public function addDocumentoParrafo(Request $request){

        $documento = ArticuloDocumento::create($request->all());
        //archivo
        if($request->file('Archivo')){
            $file= $request->file('Archivo');
            $nombre = $file->getClientOriginalName();

            $filexiste = 'transparencia/parrafos/'.$nombre;

            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('transparencia/parrafos', $request->file('Archivo'));
            }else{
                Storage::disk('public')->put('transparencia/parrafos/'.$nombre, file_get_contents($file));
                $path = 'transparencia/parrafos/'.$nombre;
            }
            $documento->fill(['Archivo' => $path])->save();
        }
        return back()
            ->with('info', 'Documento agregado con éxito');
    }
    public function addDocumentoInciso(Request $request){

        $documento = ArticuloDocumento::create($request->all());
        //archivo
        if($request->file('Archivo')){

            $file= $request->file('Archivo');
            $nombre = $file->getClientOriginalName();

            $filexiste = 'transparencia/incisos/'.$nombre;

            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('transparencia/incisos', $request->file('Archivo'));
            }else{
                Storage::disk('public')->put('transparencia/incisos/'.$nombre, file_get_contents($file));
                $path = 'transparencia/incisos/'.$nombre;
            }
            $documento->fill(['Archivo' => $path])->save();
        }
        return back()
            ->with('info', 'Documento agregado con éxito');
    }
}
