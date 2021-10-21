<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecomendacionRequest extends FormRequest
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
        return [
         'nombreRecomendacion' =>['required', 'min:6', 'max:255', 'unique:recomendacions'],
          'parte_id' =>'required',
          'sintoma_id' =>'required',
          'dosis' => ['required', 'min:6', 'max:255'],
          'frecuencia' => ['required', 'min:6', 'max:255'],
          'tiempo' => ['required', 'min:6', 'max:255'],
          'intensidadMin' => ['required', 'max:2'],
          'intensidadMax' => 'required', 'max:2',
          'edadMin' => ['required', 'max:2'],
          'edadMax' => ['required', 'max:2'],
          'informacionAdicional'=> 'max:255'
        ];
    }
}
