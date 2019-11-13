<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailContacto;

use App\Contacto;

class WebsController extends Controller
{
    //aviso de privaacidad
    public function aviso(){
        return view('web.avisodeprivacidad');
    }

    //formulario de contacto
    public function contacto(){
        return view('web.contacto');
    }
    public function contactoSend(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable|digits:10',
            'msg'   => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'msg'  => $request->msg
        );
        Mail::to('dan-y-1017@hotmail.com')->send(new SendMailContacto($data));

        $contacto = Contacto::create($request->all());
        //send
        return back()->with('info', 'Enviado correctamente');
    }
}
