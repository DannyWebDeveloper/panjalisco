<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reglas =  [
            //
            'titulo' => 'required',
            'extracto' => 'required',
            'body'    => 'required',
            'slug'   => 'required|unique:noticias,slug,',
            'id_categoria' => 'required|integer',
            'estado'  =>  'required |in:BORRADOR,PUBLICADO',

        ];

        if($this->get('img'))
            $reglas = array_merge($reglas, ['img' => 'mimes:jpg, jpeg, png']);


        return $reglas;
    }
}
