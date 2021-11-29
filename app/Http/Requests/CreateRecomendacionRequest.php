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
         'nombreRecomendacion' =>['required', 'max:255'],
          'parte_id' =>'required',
          'dosis' => ['required', 'min:6', 'max:255'],
          'frecuencia' => ['required', 'min:6', 'max:255'],
          'tiempo' => ['required', 'min:6', 'max:255'],
          'intensidad' => ['required'],
          'edadMin' => ['required'],
          'edadMax' => ['required'],
          'informacionAdicional'=> 'max:60000'
        ];
    }
}
