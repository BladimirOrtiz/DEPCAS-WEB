<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalDataRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'medicaldiagnosis' => 'required',
            'blood_type' => 'required',
            'allergies_type' => 'nullable',
            'allergies' => 'nullable',
            'additionaldescription' => 'nullable',
            'chronic_diseases' => 'nullable',


        ];
    }
}
