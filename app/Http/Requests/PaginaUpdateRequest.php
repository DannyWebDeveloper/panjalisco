<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Pagina;

class PaginaUpdateRequest extends FormRequest
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
        $id = \Request::input('id');
        //dd($id);
        $reglas =  [
            //
            'titulo' => 'required',
            'body'    => 'required',
            'slug'   => 'required|unique:paginas,slug,'.$id,
            'id_user' => 'required|integer',
            'estado'  =>  'required |in:BORRADOR,PUBLICADO',

        ];

        if($this->get('img'))
            $reglas = array_merge($reglas, ['img' => 'mimes:jpg, jpeg, png']);


        return $reglas;
    }
}
