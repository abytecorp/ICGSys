<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'document_type_id' => ['required', 'max:120'],
            'idn' => ['required', 'max:120','unique:customers'],
            'name' => ['required', 'max:120'],
            'first_last_name' => ['required', 'max:120'],
            'second_last_name' => ['required', 'max:120'],
            'birth_date' => ['required', 'max:120'],
            'born_city' => ['required'],
            'address' => ['required'],
            'address_city' => ['required'],
            'neighborhood' => ['required', 'max:120'],
            'cellphone' => ['required', 'max:120'],
            'phone' => ['required', 'max:120'],
            'mail' => ['required', 'max:120', 'email']
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Porfavor ingrese los nombres del asistente.',
            'name.max' => 'los nombres no deben superar los 120 caracteres',
            'idn.unique' => 'este numero de identificaciòn ya pertenece a otro cliente',
            'first_last_name.required' => 'Porfavor ingrese los nombres del asistente.',
            'first_last_name.max' => 'los nombres no deben superar los 120 caracteres',
            'mail.required' => 'Porfavor ingrese el correo electronico',
            'mail.email' => 'Ingrese un correo electronico valido',
            'address_city.required' => 'Debe registrar la ciudad.',
            'id_cobirth_datempany.required' => 'Es necesaria la fecha de nacimiento.',
            
        ];
    }
}