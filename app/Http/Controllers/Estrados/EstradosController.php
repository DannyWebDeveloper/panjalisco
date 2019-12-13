<?php

namespace App\Http\Controllers\Estrados;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use DB;

//modelo
use App\Estrado;



class EstradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('extrados_categorias')->where('visible', 1)->get();
        $subcategorias = DB::table('extrados_subcategorias')->where('visible', 1)->get();
        $grupos = DB::table('extrados_grupos')->where('visible', 1)->get();

        $documentos = DB::table('extrados_documentos')->where('visible', 1)->get();
        $Meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio',
        '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');

        return view('web.estrados', compact(['categorias', 'subcategorias', 'grupos', 'documentos', 'Meses']));

    }

    public function getDocumentosByNivel($nivel, $id){

        $Meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio',
        '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');

        if($nivel == 1){
            $documentos =  DB::table('extrados_documentos')->where('id_categoria', $id)->where('visible', 1)->orderBy('fechaDocumento', 'DESC')->get()->groupBy(function($item) {
                return date('Y', strtotime($item->fechaDocumento));
            }
            );
            $view = "web.estrados.categoria-documentos";
        }
        if($nivel == 2){
            $documentos =  DB::table('extrados_documentos')->where('id_subcategoria', $id)->where('visible', 1)->orderBy('fechaDocumento', 'DESC')->get()->groupBy(function($item) {
                return date('Y', strtotime($item->fechaDocumento));
            }
            );
            $view = "web.estrados.subcategoria-documentos";
        }
        if($nivel == 3){
            $nameGrupo = DB::table('extrados_grupos')->where('id', $id)->get();
            $documentos =  DB::table('extrados_documentos')->where('id_grupo', $id)->where('visible', 1)->orderBy('fechaDocumento', 'DESC')->get()->groupBy(function($item) {
                return date('Y', strtotime($item->fechaDocumento));
            }
            );
            $view = "web.estrados.grupo-documentos";
        }



        //$incisos = ArticuloInciso::all();
        return view($view, compact(['documentos', 'Meses', 'nivel', 'nameGrupo']));


    }

    public function getDocumentos($id){

    }
}
