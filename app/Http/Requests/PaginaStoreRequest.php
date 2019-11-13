<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginaStoreRequest extends FormRequest
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

    public function messages()
    {
        return [
            'titulo.required' => 'El titulo es obligatorio.',
            'body.required' => 'El cuerpo de la página no puede estar vacío.',
            'slug.required' => 'La URL de la página es obligatoria',
            'slug.unique' => 'La URL ya existe',
            'estado.required' => 'Seleccione el estado de la página',
            'archivos:mimes' => 'Formato de archivo inválido'
        ];
    }

    public function rules()
    {

        $reglas =  [
            //
            'titulo' => 'required',
            'body'    => 'required',
            'slug'   => 'required|unique:paginas,slug,',
            'id_user' => 'required|integer',
            'estado'  =>  'required |in:BORRADOR,PUBLICADO',

        ];
        /*
        $archivos = count($this->input('archivos'));
        foreach(range(0, $archivos) as $index) {
            $reglas['archivos.' . $index] = 'mimes:doc,pdf,docx|max:2000';
        }
        */


        if($this->get('img'))
            $reglas = array_merge($reglas, ['img' => 'mimes:jpg, jpeg, png']);



        if($this->get('has_file') == "SI"){
            $archivos = count($this->input('archivos'));
            foreach(range(0, $archivos) as $index) {
                $reglas['archivos.' . $index] = 'mimes:pdf,doc|max:2000';
            }
        }

        //if()

        return $reglas;
    }
}
