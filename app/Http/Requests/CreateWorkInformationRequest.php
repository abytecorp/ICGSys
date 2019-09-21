<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkInformationRequest extends FormRequest
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
            'montly_income' => ['required', 'max:120'],
            'position_id' => ['required', 'max:120'],
            'init_date' => ['required'],
            'obs' => ['required']
        ];
    }
    public function messages()
    {
        return[
            'montly_income.required' => 'Porfavor ingrese el ingreso mensual.',
            'position_id.required' => 'Porfavor ingrese el cargo en la empresa.',
            'init_date.required' => 'Porfavor seleccione la fecha de ingreso a al empresa.',
            'obs.required' => 'Porfavor ingrese una observación.',
        ];
    }
}
