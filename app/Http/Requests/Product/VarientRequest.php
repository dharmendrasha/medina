<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VarientRequest extends FormRequest
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
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // //Product
            // 'code.required' => 'El :attribute es obligatorio.',
            // 'code.unique' => 'El :attribute ya se encuentra registrado.',
            // 'name.required' => 'El :attribute es obligatorio.',
            // 'name.min' => 'El :attribute es obligatorio.',
            // 'description.required' => 'El :attribute es obligatorio.',
            // 'description.min' => 'El :attribute es obligatorio.',
            // 'quantity.required' => 'La :attribute es obligatoria.',
            // 'quantity.integer' => 'La :attribute debe ser un número entero.',
            // 'quantity.min' => 'La :attribute debe ser al menos :min.',
            // 'price.required' => 'El :attribute es obligatorio.',
            // 'price.numeric' => 'El :attribute debe ser un valor numérico.',
            // 'extemp.in' => 'El :attribute seleccionado es inválido.',
        ];
    }

    /**
     * It will return the error response to json
     * @override function
     */
    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422)); 
    }

}
