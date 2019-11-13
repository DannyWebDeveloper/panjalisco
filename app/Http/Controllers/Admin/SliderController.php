<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Slider;
use Auth;
class SliderController extends Controller
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
        //
        $sliders = Slider::orderBy('id', 'DESC')->paginate();
        return view('admin.sliders.index', compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sliders.create');
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
        $slider = Slider::create($request->all());

        $slider->fill($request->all())->save();
        $path = Storage::disk('public')->put('img-sliders', $request->file('img'));
        $slider->fill(['img' => asset($path)])->save();


        return redirect()->route('adminsliders.index')
        ->with('info', 'Slider creado con éxito');
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
        //slider
        $slider = Slider::find($id);

        return view('admin.sliders.show', compact(['slider']));
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
        $slider = Slider::find($id);
        return view('admin.sliders.edit', compact('slider'));
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
        $slider = Slider::find($id);
        //$this->authorize('pass', $pagina);

        $slider->fill($request->all())->save();
        $path = Storage::disk('public')->put('img-sliders', $request->file('img'));
        $slider->fill(['img' => asset($path)])->save();

        return redirect()->route('adminsliders.edit', $slider->id)
            ->with('info', 'Slider actualizado con éxito');
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
        $slider = Slider::find($id);
        $slider->delete();
        return back()->with('info', 'Slider eliminado correctamente');


    }
}
