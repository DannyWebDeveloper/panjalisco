<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Social;
use App\What;

class SocialController extends Controller
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
        $socials = Social::orderBy('id', 'DESC')->paginate();


        $what = What::first();

        return view('admin.socials.index', compact(['socials', 'what']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.socials.create');
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
        $social = Social::create($request->all());


         //archivo icon
         if($request->file('icon')){

            $file= $request->file('icon');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img', $request->file('icon'));
            }else{
                Storage::disk('public')->put('img/'.$nombre, file_get_contents($file));
                $path = 'img/'.$nombre;
            }
            $social->fill(['icon' => $path])->save();
        }

        return redirect()->route('adminsocials.index')
        ->with('info', 'Link social creado con éxito');
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
        $social = Social::find($id);
        return view('admin.socials.edit', compact('social'));

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
        $social = Social::find($id);

        $social->fill($request->all())->save();

         //archivo icon
         if($request->file('icon')){

            $file= $request->file('icon');
            $nombre = $file->getClientOriginalName();
            $filexiste = 'img/'.$nombre;
            if (Storage::disk('public')->exists($filexiste)) {
                //si existe el nombre, agrega uno aleatorio
                $path = Storage::disk('public')->put('img', $request->file('icon'));
            }else{
                Storage::disk('public')->put('img/'.$nombre, file_get_contents($file));
                $path = 'img/'.$nombre;
            }
            $social->fill(['icon' => $path])->save();
        }

        return redirect()->route('adminsocials.edit', $social->id)
            ->with('info', 'Link social actualizado con éxito');
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
        $social = Social::find($id);
        $social->delete();
        return back()->with('info', 'Link social eliminado correctamente');
    }


    public function editWhats(){
        /////dd(111);
        //$what = What::get()->firt();

        return view('admin.socials.whats', compact('what'));
    }
    public function updateWhats(Request $request){

        $id = $request->get('id');
        $what = What::find($id);
        $what->fill($request->all())->save();
        return redirect()->route('adminsocials.index')
        ->with('info', 'WhatsApp actualizado con éxito');
    }
}
