<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'bs_name' => ['required', 'max:120', 'unique:companies'],
            'email' => ['required', 'email', 'unique:companies'],
            'nit' => ['unique:companies', 'max:9', 'min:9'],
            'city_id' => ['required']
            //'logo' => ['required'],
        ];
    }
    public function messages()
    {
        return[
            'bs_name.required' => 'Porfavor ingrese los nombres de la empresa.',
            'bs_name.max' => 'El nombre no deben superar los 120 caracteres',
            'bs_name.unique' => 'Ya existe una empresa registrada con esta razon social.',
            'email.required' => 'Porfavor ingrese el correo electronico',
            'email.email' => 'Ingrese un correo electronico valido',
            'email.unique' => 'Este correo ya pertenece a otra empresa',
            'nit.unique' => 'ya existe una empresa inscrita con este NIT',
            'nit.max' => 'El nit debe contener maximo 9 digitos',
            'nit.min' => 'El nit debe contener minimo 9 digitos',
            'city_id.required' => 'Debe ingresar la ciudad de la empresa',
            'logo.required' => 'Debe agregar una imagen para establecer el logo de la Empresa',
            // 'logo.max' => 'El tamaño del archivo no debe superar el peso de 500kb.',
            // 'logo.image' => 'El archivo debe ser una imajen en formato JPG o PNG',
        ];
    }
}
