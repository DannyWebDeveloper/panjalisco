<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaStoreRequest;
use App\Http\Requests\NoticiaUpdateRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Noticia;
use App\Categoria;
use Auth;

class NoticiaController extends Controller
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
        $noticias = Noticia::orderBy('id', 'DESC')->paginate();
        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('admin.noticias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaStoreRequest $request)
    {

        $validator =  Validator::make($request->all(), [
            'titulo' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'id_categoria' => ['required'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'estado' => ['required'],
            'extracto' => ['required'],
            'body' => ['required'],
        ]);

        $noticia = Noticia::create($request->all());
        //archivo imagen
        if($request->file('img')){
            $path = Storage::disk('public')->put('img-noticias', $request->file('img'));

            $noticia->fill(['img' => asset($path)])->save();
        }


        return redirect()->route('adminnoticias.index')
            ->with('info', 'Noticia creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //noticia
        $noticia = Noticia::find($id);
        //$this->authorize('pass', $noticia);


        $categoria = Categoria::
        join('noticias', 'noticias.id_categoria', '=', 'categorias.id')
        ->select('categorias.nombre', 'categorias.slug' )
        ->where('noticias.id', $id)
        ->get();

        return view('admin.noticias.show', compact(['noticia', 'categoria']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        //$this->authorize('pass', $noticia);

        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id');



        return view('admin.noticias.edit', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaUpdateRequest $request, $id)
    {
        $noticia = Noticia::find($id);
        //$this->authorize('pass', $noticia);

        $noticia->fill($request->all())->save();

         //archivo imagen
         if($request->file('img')){
            $path = Storage::disk('public')->put('img-noticias', $request->file('img'));

            $noticia->fill(['img' => asset($path)])->save();
        }

        return redirect()->route('adminnoticias.edit', $noticia->id)
            ->with('info', 'Noticia actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);;
        //$this->authorize('pass', $noticia);

        $noticia->delete();
        return back()->with('info', 'Eliminado correctamente');
    }


    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.date("d-m-Y").'.'.$extension;

            //Upload File
            //$request->file('upload')->storeAs('public/uploads', $filenametostore);
            //Move Uploaded File
            $destinationPath = 'uploads';
            $request->file('upload')->move($destinationPath,$filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$filenametostore);
            $msg = 'Se ha subido correctamenete.';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
