<?php

namespace App\Http\Controllers\Articulos;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

//modelo
use App\Articulo;
use App\ArticuloParrafo;
use App\ArticuloInciso;
use App\ArticuloDocumento;



class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$articulos = Articulo::all()->where('Visible', '1');
        $articulos = Articulo::where('Visible', 1)
        ->orderBy('Orden', 'asc')
        ->get();

        $parrafos = ArticuloParrafo::where('Visible', 1)
        ->orderBy('Orden', 'asc')
        ->get();

        $documentos_parrafos = ArticuloParrafo::
        selectRaw('articulo_parrafos.id, count(*) as cantidad_docs')
        ->join('articulo_documentos', 'articulo_documentos.id_parrafo', '=', 'articulo_parrafos.id')
        ->where('articulo_documentos.Visible', 1)
        ->groupBy('articulo_parrafos.id')
        ->get();

        $documentos_parrafo =  ArticuloParrafo::
        select('articulo_parrafos.id', 'articulo_documentos.NombreDocumento', 'articulo_documentos.id_parrafo', 'articulo_documentos.Archivo',  'articulo_documentos.Link',  'articulo_documentos.FechaDocumento', 'articulo_documentos.FechaCorresponde', 'articulo_documentos.FechaAutoDoc'   )
        ->join('articulo_documentos', 'articulo_documentos.id_parrafo', '=', 'articulo_parrafos.id')
        ->where('articulo_documentos.Visible', 1)
        ->get();

        //fecha en caso que sea auto
        $day = Carbon::now()->format('d');
        $mes = Carbon::now()->format('m');
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        if($day < 5)
        {
            $mes = $mes - 1;
            $mes2 = $mes - 1;
            $fecha_act = Carbon::now()->month($mes)->day(5)->format('Y-m-d');

            $fecha_corresponde = Carbon::now()->month($mes2)->day(5);
            $mes = $meses[($fecha_corresponde->format('n')) - 1];
            $fecha_corresponde =  $mes . ' de ' . $fecha_corresponde->format('Y');

        }else{
            $mes2 = $mes - 1;
            $fecha_act = Carbon::now()->day(5)->format('Y-m-d');
            $fecha_corresponde = Carbon::now()->month($mes2)->day(5)->format('Y-m-d');
        }


        $incisos = ArticuloInciso::where('Visible', 1)->orderby('Id_Parrafo')->orderBy('Orden')->get();

        return view('web.transparencia', compact(['articulos', 'parrafos', 'documentos_parrafos', 'documentos_parrafo', 'incisos', 'fecha_act', 'fecha_corresponde']));
    }

    public function getDocumentosInciso(Request $request, $id){

        $whois = "inciso";

        $Meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio',
        '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');

        $documentos_inciso = ArticuloDocumento::where('Id_Inciso', $id)->where('visible', 1)->orderBy('FechaDocumento', 'DESC')->get()->groupBy(function($item) {
            //return $item->FechaDocumento;
            return date('Y', strtotime($item->FechaDocumento));
            //return Carbon::parse($item->FechaDocumento)->format('Y');
        }
        );

        //fecha en caso que sea auto
        $day = Carbon::now()->format('d');
        $mes = Carbon::now()->format('m');
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        if($day < 5)
        {
            $mes = $mes - 1;
            $mes2 = $mes - 1;
            $fecha_act = Carbon::now()->month($mes)->day(5)->format('Y-m-d');
            $fecha_corresponde = Carbon::now()->month($mes2)->day(5)->format('Y-m-d');
        }else{
            $mes2 = $mes - 1;
            $fecha_act = Carbon::now()->day(5)->format('Y-m-d');
            $fecha_corresponde = Carbon::now()->month($mes2)->day(5)->format('Y-m-d');
        }

        //$incisos = ArticuloInciso::all();
        return view('web.transparencia.documentos', compact(['documentos_inciso', 'Meses', 'inciso', 'whois', 'fecha_act', 'fecha_corresponde']));
    }

    public function getDocumentosParrafo(Request $request, $id){
        $whois = "parrafo";

        $Meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio',
        '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');

        $documentos_parrafo = ArticuloDocumento::where('id_parrafo', $id)->where('visible', 1)->orderBy('FechaDocumento', 'DESC')->get()->groupBy(function($item) {
            //return $item->FechaDocumento;
            return date('Y', strtotime($item->FechaDocumento));
            //return Carbon::parse($item->FechaDocumento)->format('Y');
        }
        );
        //$incisos = ArticuloInciso::all();
        return view('web.transparencia.documentos', compact(['documentos_parrafo', 'Meses', 'whois']));
    }

    public function showUploadFile(Request $request) {
        $file = $request->file('image');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
     }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
